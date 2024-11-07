<template>
    <div class="p-4 max-w-md mx-auto bg-white shadow-md rounded-lg">
      <div class="flex flex-col items-center">
        <img
          :src="profileImageUrl"
          alt="Profile Picture"
          class="rounded-full w-24 h-24 mb-4"
        />
        <input type="file" @change="onImageSelected" class="mb-4" />
        <h2 class="text-xl font-semibold text-gray-900">{{ currentUser.name }}</h2>
        <p class="text-gray-600">{{ currentUser.email }}</p>
      </div>
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
  const selectedImage = ref(null);
  
  function onImageSelected(event) {
    const file = event.target.files[0];
    if (file) {
      selectedImage.value = file;
      uploadProfileImage();
    }
  }

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

  </style>
  