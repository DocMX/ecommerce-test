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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
    public function imgProfile ($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        // Verificar si se proporcionó un archivo en la solicitud
        if ($request->hasFile('profile_image')) {
            // Obtener el archivo de imagen de perfil
            $profileImageFile = $request->file('profile_image');
    
            // Guardar el archivo en la ubicación deseada (ejemplo: storage/app/public/profile_images)
            $profileImagePath = $profileImageFile->store('public/profile_images');
    
            // Obtener la URL del archivo guardado
            $profileImageUrl = url(Storage::url($profileImagePath));
    
            // Actualizar la ruta de la imagen de perfil en el modelo de usuario
            $user->profile_image = $profileImageUrl;
        }
        $user->save(); 
        return response()->json([
            'status' => 'success',
            'message' => 'poerfil actualizado exitosamente',
            'data' => [
                'user' => $user,
            ]
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }
}