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
    public function imgProfile($id, UpdateUserRequest $request)
    {
        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Verificar si se proporcionó un archivo en la solicitud
        if ($request->hasFile('image')) {
        // Obtener el archivo de imagen de perfil
        $profileImageFile = $request->file('image');

        // Definir la carpeta de almacenamiento para las imágenes de perfil
        $path = 'profile_images/' . Str::random(20); // Usamos un nombre único para cada imagen

        // Verificar si la carpeta no existe en el disco 'public' y la crea si es necesario
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path, 0755, true);
        }

        // Generar un nombre aleatorio para la imagen de perfil con la extensión original
        $imageName = Str::random(20) . '.' . $profileImageFile->getClientOriginalExtension();

        // Intentar guardar la imagen en el disco público
        try {
            // Guardar la imagen en el disco público
            $imagePath = Storage::disk('public')->putFileAs($path, $profileImageFile, $imageName);
        } catch (\Exception $e) {
            // Si no se pudo guardar, lanzar un error
            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo guardar la imagen: ' . $e->getMessage(),
            ], 500);
        }

        // Obtener la URL pública de la imagen guardada
        $profileImageUrl = url(Storage::url($imagePath));

        // Actualizar la ruta de la imagen de perfil en el modelo de usuario
        $user->profile_image = $profileImageUrl;
        }

        // Guardar los cambios en el modelo de usuario
        $user->save();

        // Responder con un mensaje de éxito
        return response()->json([
            'status' => 'success',
            'message' => 'Perfil actualizado exitosamente',
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