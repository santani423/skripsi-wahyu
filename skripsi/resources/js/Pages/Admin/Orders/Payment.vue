<template>
    <AppAdmin>
      <div class="text-xl font-semibold mb-8 ">Proof Payment DP Or Paid Off </div>
      <div v-for="(payment, i) in payments" class="flex flex-col mb-4" :key="i">
        <div class="font-semibold text-xl mb-4 bg-blue-500 py-2 px-4 rounded-lg text-white text-center">Proof Payment ~
          <span class="uppercase">{{ payment.payment_type }}</span> </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Bank</div>
          <div class="font-semibold">: {{ payment.bank_name ?? '-' }}</div>
        </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Account Number</div>
          <div class="font-semibold">: {{ payment.account_number ?? '-' }}</div>
        </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Name</div>
          <div class="font-semibold">: {{ payment.name ?? '-' }}</div>
        </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Phone Number</div>
          <div class="font-semibold">: {{ payment.phone_number ?? '-' }}</div>
        </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Image</div>
          <div v-if="payment.image_transfer" class="flex justify-start my-6">
            <div class="mr-2">: </div> <img :src="'/storage/images/payments/' + payment.image_transfer" alt="cover">
          </div>
          <div v-else-if="!payment.image_transfer">
            <div>: -</div>
          </div>
        </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Status</div>
          <div class="font-semibold">: {{ payment.status ?? '-' }}</div>
        </div>
        <div class="grid grid-cols-2 text-lg gap-4 mb-4">
          <div>Change Status payment</div>
          <form @submit.prevent="submit({order:payment.order_id, type:payment.payment_type})">
            <select v-model="form.status" class="border-slate-200  rounded-lg" >
              <option value=""  disabled selected >Select status</option>
              <option value="pending" >Pending</option>
              <option value="rejected" >Rejected</option>
              <option value="paid">Paid</option>
            </select>
            <div v-if="form.errors.status" class="text-red-500 my-2">
            {{ form.errors.status }}
          </div>
            <button type="submit" class=" ml-4 bg-blue-500 py-1 px-2 text-white rounded-lg">Change Status</button>

          </form>


        </div>
      </div>
    </AppAdmin>
  </template>

  <script setup>
  import { Link, useForm, usePage } from '@inertiajs/vue3';
import AppAdmin from '../../../Layouts/AppAdmin.vue';
  const {payments} = usePage().props
  const form = useForm({
    status: ''
  })

  function submit({order, type}){
    form.put(`/admin/orders/${order}/payment/${type}`, {
      onSuccess: () => {
        alert('Update Status Success')
        form.reset()
      }
    })
  }
  </script>
