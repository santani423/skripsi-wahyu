<template>
  <App>
    <div v-for="(payment, i) in payments" :key="i">
      <h1 class="text-xl mt-6 font-bold">
        Payment ({{ payment.payment_type }})
      </h1>
      <div class="mt-8 flex text-xl items-start gap-12">
        <div class="flex flex-col gap-8">
          <div>Sender Transfer Name</div>
          <div>Bank Name</div>
          <div>Account Number</div>
          <div>Phone Number</div>
          <div>Status</div>
          <div>Image</div>
        </div>
        <div class="flex flex-col gap-8">
          <div>: {{ payment.name }}</div>
          <div>: {{ payment.bank_name }}</div>
          <div>: {{ payment.account_number }}</div>
          <div>: {{ payment.phone_number }}</div>
          <div>: {{ payment.status }}</div>
          <div :class="{ hidden: !payment.image_transfer }">
            <img
              :src="'/storage/images/payments/' + payment.image_transfer"
              alt="proof"
            />
          </div>
        </div>
      </div>
      <div></div>
    </div>
  </App>
</template>

  <script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import App from "../../Layouts/App.vue";
const { payments } = usePage().props;
</script>
