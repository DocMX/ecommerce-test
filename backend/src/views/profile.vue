<template>
    <div class="p-4 max-w-md mx-auto bg-white shadow-md rounded-lg">
      <div class="flex flex-col items-center">
        <!-- Imagen de perfil del usuario -->
        <img
          :src="profileImageUrl"
          alt="Profile Picture"
          class="rounded-full w-24 h-24 mb-4"
        />
        
        <!-- Botón para subir una nueva imagen de perfil -->
        <input type="file" @change="onImageSelected" class="mb-4" />
    
        <!-- Nombre y correo del usuario -->
        <h2 class="text-xl font-semibold text-gray-900">{{ currentUser.name }}</h2>
        <p class="text-gray-600">{{ currentUser.email }}</p>
        
        <!-- Campo editable para cambiar el nombre -->
        <div class="mt-4">
          <input
            v-if="isEditingName"
            type="text"
            v-model="newName"
            class="border p-2 rounded"
            placeholder="Nuevo nombre"
          />
          <button
            v-if="isEditingName"
            @click="saveNameChange"
            class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700"
          >
            Guardar nombre
          </button>
          <button
            v-else
            @click="startEditingName"
            class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700"
          >
            Editar nombre
          </button>
        </div>
      </div>
      
      <!-- Botón de edición para la imagen de perfil -->
      <button
        @click="editProfile"
        class="mt-6 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700"
      >
        Edit Profile
      </button>
    </div>
  </template>
  
  <script setup>
  import { computed, ref } from 'vue';
  import store from '../store';
  import router from '../router';
  
  const currentUser = computed(() => store.state.user.data);
  const profileImageUrl = computed(() => {
    return (
      currentUser.value?.profile_image ||
      currentUser.value?.imgUrl ||
      'https://th.bing.com/th/id/OIP.qrCW0XaX0SW78KKlL9l05wHaHa?rs=1&pid=ImgDetMain'
    );
  });
  
  const isEditingName = ref(false); // Estado para controlar si se está editando el nombre
  const newName = ref(currentUser.value?.name); // Almacenar el nuevo nombre
  
  // Función para iniciar la edición del nombre
  function startEditingName() {
    isEditingName.value = true;
  }
  
  // Función para guardar el cambio de nombre
  function saveNameChange() {
    if (newName.value && newName.value !== currentUser.value.name) {
      store.dispatch('updateUserName', newName.value) // Despachar acción para actualizar el nombre
        .then(() => {
          currentUser.value.name = newName.value; // Actualizar el nombre en el estado local
          isEditingName.value = false; // Dejar de editar
          alert('Nombre actualizado con éxito.');
        })
        .catch(() => {
          alert('Hubo un problema al actualizar el nombre.');
        });
    } else {
      alert('El nombre no ha cambiado.');
    }
  }
  
  // Función para manejar la edición de la imagen de perfil
  function editProfile() {
    router.push({ name: 'edit-profile' });
  }
  
  const selectedImage = ref(null);
  
  // Función para manejar la selección de la imagen
  function onImageSelected(event) {
    const file = event.target.files[0];
    if (file) {
      selectedImage.value = file;
      uploadProfileImage();
    }
  }
  
  // Función para subir la nueva imagen
  function uploadProfileImage() {
    if (selectedImage.value) {
      const formData = new FormData();
      formData.append('image', selectedImage.value);
  
      store.dispatch('updateProfileImage', formData)
        .then(() => {
          alert('Imagen de perfil actualizada con éxito.');
        })
        .catch(() => {
          alert('Hubo un problema al actualizar la imagen de perfil.');
        });
    }
  }
  </script>
  
  <style scoped>
  /* Aquí puedes agregar tus estilos personalizados */
  </style>
  