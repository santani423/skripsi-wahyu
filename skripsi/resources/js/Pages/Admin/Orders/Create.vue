<template>
  <AppAdmin>
    <h1 class="text-2xl font-semibold">Create Orders</h1>
    <div class="my-4 text-gray-500 flex gap-1 text-sm italic">
      <Link href="/admin/orders">order</Link>
      <div>/ create</div>
    </div>
    <form @submit.prevent="submit">
      <div class="mb-4 flex flex-col gap-2">
        <label for="user">User</label>
        <select v-model="form.userId" class="rounded-lg border-slate-200">
          <option value="" disabled>Select Venue</option>
          <option v-for="(user, i) in users" :value="user.id" :key="i">
            {{ user.name }}
          </option>
        </select>
        <div v-if="form.errors.user_id" class="text-red-500 my-2">
          {{ form.errors.userId }}
        </div>
      </div>
      <div class="mb-4 flex flex-col gap-2">
        <label for="user">Service</label>
        <select v-model="form.serviceId" class="rounded-lg border-slate-200">
          <option value="" disabled>Select Venue</option>
          <option v-for="(service, i) in services" :value="service.id" :key="i">
            {{ service.name }}
          </option>
        </select>
        <div v-if="form.errors.serviceId" class="text-red-500 my-2">
          {{ form.errors.serviceId }}
        </div>
      </div>
      <div>
        <div class="w-full mb-4">
          <input
            type="datetime-local"
            class="border-neutral-100 w-full rounded-lg"
            placeholder="24-09-2023 10:00"
            v-model="form.orderDate"
          />
          <div v-if="form.errors.orderDate" class="text-red-500 my-2">
            {{ form.errors.orderDate }}
          </div>
        </div>
        <div class="w-full mb-4">
          <input
            type="text"
            name=""
            class="border-neutral-100 w-full rounded-lg"
            placeholder="Phone Number"
            v-model="form.phoneNumber"
          />
          <div v-if="form.errors.phoneNumber" class="text-red-500 my-2">
            {{ form.errors.phoneNumber }}
          </div>
        </div>
        <div class="w-full">
          <textarea
            name=""
            class="border-neutral-100 w-full rounded-lg"
            placeholder="Address"
            v-model="form.address"
          ></textarea>
          <div v-if="form.errors.address" class="text-red-500 my-2">
            {{ form.errors.address }}
          </div>
        </div>
      </div>
      <button
        type="submit"
        class="mt-6 bg-blue-500 py-2 px-4 rounded-lg text-base text-white"
      >
        Create Order
      </button>
    </form>
  </AppAdmin>
</template>

  <script setup>
import { Link, useForm, usePage } from "@inertiajs/vue3";
import AppAdmin from "../../../Layouts/AppAdmin.vue";
import { ref } from "vue";

const { services, users } = usePage().props;

const form = useForm({
  userId: null,
  serviceId: null,
  orderDate: null,
  phoneNumber: null,
  address: null,
});

function submit() {
  form.post("/admin/orders/create", {
    forceFormData: true,
    onSuccess: () => {
      alert("success");
    },
  });
}
</script>
