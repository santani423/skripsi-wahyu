<template>
    <div class="bg-neutral-50">
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="text-3xl font-semibold tracking-wide">
                Admin Login Page
            </div>
            <div class="bg-neutral-0 rounded-lg shadow-lg mt-4 w-[80vh] p-8">
                <div v-if="form.errors.message" class="text-red-500 my-2 text-lg text-center">
                    {{ form.errors.message }}
                </div>
                <form @submit.prevent="submit">
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            placeholder="your email address"
                            class="border-spacing-0 border-neutral-100 rounded-lg"
                            v-model="form.email"
                        />
                        <div
                            v-if="form.errors.email"
                            class="text-red-500 my-2"
                        >
                            {{ form.errors.email }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            placeholder="your password"
                            class="border-spacing-0 border-neutral-100 rounded-lg"
                            v-model="form.password"
                        />
                        <div
                            v-if="form.errors.password"
                            class="text-red-500 my-2"
                        >
                            {{ form.errors.password }}
                        </div>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="py-2 px-6 bg-blue-500 text-neutral-0 rounded-lg hover:bg-blue-600"
                        >
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";

const page = usePage().props;

onMounted(() => {
  if(page.user && page.user?.role === 'admin' ){
    router.visit('/admin')
  }
})

const form = useForm({
    email: null,
    password: null,
});

function submit(e) {
    form.post("/admin/login", {
        onSuccess: () => {
            alert("success");
        },
    });
}
</script>

<style></style>
