<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Api\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = User::query()
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage);

        return UserResource::collection($query);
    }
    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['is_admin'] = true;
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $data['password'] = Hash::make($data['password']);

        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $user = User::create($data);

        return new UserResource($user);
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $data['updated_by'] = $request->user()->id;

        $user->update($data);

        return new UserResource($user);
    }
    public function imgProfile($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {
        $profileImageFile = $request->file('image');
        $path = 'profile_images/' . Str::random(20); 
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path, 0755, true);
        }
        $imageName = Str::random(20) . '.' . $profileImageFile->getClientOriginalExtension();
        try {
            $imagePath = Storage::disk('public')->putFileAs($path, $profileImageFile, $imageName);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo guardar la imagen: ' . $e->getMessage(),
            ], 500);
        }

        $profileImageUrl = url(Storage::url($imagePath));

        $user->profile_image = $profileImageUrl;
        }

        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Perfil actualizado exitosamente',
            'data' => [
                'user' => $user,
            ]
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }
}