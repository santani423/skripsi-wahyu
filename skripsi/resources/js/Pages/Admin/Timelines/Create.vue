<template>
    <AppAdmin>
      <h1 class="text-2xl font-semibold">Create Timelines</h1>
      <div class="my-4 text-gray-500 flex gap-1 text-sm italic">
        <Link href="/admin/timelines">timelines</Link>
        <div> / create</div>
      </div>
      <form @submit.prevent="submit">
        <div class="my-4">
          <label for="name">Orders</label>
          <input type="text" v-model="form.name" class="mt-2 border-neutral-100 w-full rounded-lg"
            placeholder="Timeline Name" />
          <div v-if="form.errors.name" class="text-red-500 my-2">
            {{ form.errors.name }}
          </div>
        </div>
        <button type="submit" class="mt-6 bg-blue-500 py-2 px-4 rounded-lg text-base text-white">
          Create Timeline
        </button>
      </form>
    </AppAdmin>
  </template>

  <script setup>
  import { Link, useForm, usePage } from "@inertiajs/vue3";
  import AppAdmin from "../../../Layouts/AppAdmin.vue";
  import { ref } from "vue";

  const form = useForm({
      name : null,
  })


  function submit() {
    form.post("/admin/timelines/create", {
      forceFormData: true,
      onSuccess: () => {
        alert("success");
      },
    });
  }
  </script>
