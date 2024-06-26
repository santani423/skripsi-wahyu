<template>
  <AppAdmin>
    <h1 class="text-2xl font-semibold">Edit Service</h1>
    <div class="my-4 text-gray-500 flex gap-1 text-sm italic">
      <Link href="/admin/services">services</Link>
      <div>/ edit</div>
    </div>
    <form @submit.prevent="submit">
      <div class="my-4">
        <label for="name">Name</label>
        <input
          type="text"
          v-model="form.name"
          class="mt-2 border-neutral-100 w-full rounded-lg"
          placeholder="Service Name"
        />
        <div v-if="form.errors.name" class="text-red-500 my-2">
          {{ form.errors.name }}
        </div>
      </div>
      <div class="mb-4">
        <label for="description">Description</label>
        <textarea
          v-model="form.description"
          class="mt-2 border-neutral-100 w-full rounded-lg"
          rows="4"
          placeholder="Description"
        ></textarea>
        <div v-if="form.errors.description" class="text-red-500 my-2">
          {{ form.errors.description }}
        </div>
      </div>
      <div class="mb-4">
        <label for="price">Price</label>
        <input
          type="number"
          v-model="form.price"
          class="mt-2 border-neutral-100 w-full rounded-lg"
          placeholder="4000000"
        />
        <div v-if="form.errors.price" class="text-red-500 my-2">
          {{ form.errors.price }}
        </div>
      </div>
      <div class="mb-4">
        <label for="image">Image</label>
        <input
          type="file"
          id="image"
          class="mt-2 border-neutral-100 w-full"
          placeholder="Max Capacity"
          @input="form.imageUrl = $event.target.files[0]"
          @change="preview"
        />
        <div v-if="form.errors.imageUrl" class="text-red-500 my-2">
          {{ form.errors.imageUrl }}
        </div>
        <!-- Preview -->
        <div class="mt-4">
          <img
            :src="
              imagePreview
                ? imagePreview
                : '/storage/images/services/' + service.image_url
            "
            alt=""
          />
        </div>
      </div>
      <button
        type="submit"
        class="mt-6 bg-blue-500 py-2 px-4 rounded-lg text-base text-white"
      >
        Update Service
      </button>
    </form>
  </AppAdmin>
</template>

  <script setup>
import { Link, useForm, usePage } from "@inertiajs/vue3";
import AppAdmin from "../../../Layouts/AppAdmin.vue";
import { ref } from "vue";
const { service } = usePage().props;




const form = useForm({
  name: service.name ?? null,
  imageUrl: service.image_url ?? null,
  description: service.description ?? null,
  price: service.price ?? null,
});


const imagePreview = ref("");
const preview = (e) => {
  const file = event.target.files[0];
  if (file && file.type.includes("image/")) {
    form.image = file; // Menyimpan gambar yang diunggah ke field form
    // Membaca file gambar menggunakan FileReader
    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.value = e.target.result; // Menyimpan URL gambar ke field state
    };
    reader.readAsDataURL(file);
  }
};

function submit() {

  form.post(`/admin/services/${service.id}`, {
    onSuccess: () => {
      alert("Service Updated");
    },
  });
}
</script>
