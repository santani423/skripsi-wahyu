<template>
    <App>
        <div class="text-2xl font-bold mt-6">Your Order</div>
        <div class="mt-6 flex flex-col gap-4">
        <div v-for="(order,i) in orders" class="flex items-center gap-2 bg-neutral-50 p-4 rounded-lg hover:bg-blue-100" :key="i" >
          <div class="font-semibold">{{ order?.service.name }} /</div>
          <div> {{ order.order_date }} /</div>
          <div class="font-bold">{{ order.order_status }} / </div>
          <div class="flex gap-3">
            <Link :href="'/payment/' + order.id + '/detail'" class="bg-blue-600 rounded-lg float-left shadow-md py-1 px-3 text-white hover:bg-blue-500">Detail Pembayaran</Link>
            <Link :href="'/dashboard/' + order.id + '/timeline'" class="bg-green-600 rounded-lg float-left shadow-md py-1 px-3 text-white hover:bg-green-500">Cek Timeline</Link>
            <Link :href="'/' + order.id + '/payment'" class="bg-red-600 rounded-lg float-left shadow-md py-1 px-3 text-white hover:bg-red-500" :class="{'hidden': order.order_status === 'finished'}">Pembayaran</Link>
          </div>
        </div>

      </div>
    </App>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import App from '../../Layouts/App.vue';

const {orders} = usePage().props


</script>
