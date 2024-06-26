<template>
    <AppAdmin>
      <h1 class="text-2xl font-semibold">Edit Order Timeline</h1>
      <div class="my-4 text-gray-500 flex gap-1 text-sm italic">
        <Link href="/admin/orders">order</Link>
        <div>/ edit timeline</div>
      </div>
      <form @submit.prevent="submit">
        <div class="mb-4 flex flex-col gap-2">
          <label for="user">Timeline</label>
          <select v-model="form.timelineValue" class="rounded-lg border-slate-200">
            <option value="" disabled>Select Venue</option>
            <option v-for="(timeline, i) in timelines" :value="timeline.name" :key="i">
              {{ timeline.name }}
            </option>
          </select>
          <div v-if="form.errors.timelineValue" class="text-red-500 my-2">
            {{ form.errors.timelineValue }}
          </div>
        </div>
        <button
          type="submit"
          class="mt-6 bg-blue-500 py-2 px-4 rounded-lg text-base text-white"
        >
          Update Timeline Order
        </button>
      </form>
    </AppAdmin>
  </template>

    <script setup>
  import { Link, useForm, usePage } from "@inertiajs/vue3";
  import AppAdmin from "../../../Layouts/AppAdmin.vue";

  const { timelines, order } = usePage().props;

  const form = useForm({
    timelineValue: order.timeline_value ?? null,
  });

  function submit() {
    form.put(`/admin/orders/${order.id}/update-timeline`, {
      onSuccess: () => {
        alert("success");
      },
    });
  }
  </script>
