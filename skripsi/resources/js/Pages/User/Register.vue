<template>
    <div class="bg-neutral-50">
      <div class="flex flex-col items-center justify-center h-screen">
        <div class="text-3xl font-semibold tracking-wide">Register Page</div>
        <div class="bg-neutral-0 rounded-lg shadow-lg mt-4  w-[80vh]  p-8">
          <form @submit.prevent="submit">
            <!-- name -->
            <div class="flex flex-col gap-2 mb-4">
              <label for="email">Name</label>
              <input name="name" v-model="form.name" type="text" placeholder="your fullname"
                class="border-spacing-0 border-neutral-100 rounded-lg" />
              <div v-if="form.errors.name" class="text-red-500 my-2">
                {{ form.errors.name }}
              </div>
            </div>
            <!-- Email -->
            <div class="flex flex-col gap-2 mb-4">
              <label for="email">Email</label>
              <input type="email" v-model="form.email" placeholder="your email address"
                class="border-spacing-0 border-neutral-100 rounded-lg" />
                <div v-if="form.errors.email" class="text-red-500 my-2">
                {{ form.errors.email }}
              </div>
            </div>
            <!-- Password -->
            <div class="flex flex-col gap-2 mb-4">
              <label for="password">Password</label>
              <input type="password" v-model="form.password" placeholder="your password"
                class="border-spacing-0 border-neutral-100 rounded-lg" />
                <div v-if="form.errors.password" class="text-red-500 my-2">
                {{ form.errors.password }}
              </div>
            </div>

            <!-- Action -->
            <div>
              <div class="mb-2">
                Saya sudah punya akun?
                <Link href="/login" class="text-blue-500 underline hover:text-blue-600">
                Login
                </Link>
              </div>
              <button type="submit" class="py-2 px-6 bg-blue-500 text-neutral-0 rounded-lg hover:bg-blue-600">
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { Link, useForm } from "@inertiajs/vue3";

  const form = useForm({
    name: null,
    email: null,
    password: null
  })

  function submit() {
    form.post('/register', {
      onSuccess: () => {
        alert('Success Register')
      }
    })
  }
  </script>

  <style>
  </style>
