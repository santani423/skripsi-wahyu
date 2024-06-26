<template>
  <App>
    <div class="mt-4 pb-20">
      <div class="font-bold text-xl">{{ service.name }}</div>
      <img
        :src="'/storage/images/services/' + service.image_url"
        alt="venue-img"
        class="mt-4 object-cover h-[25rem] w-full rounded-md"
      />
      <div class="grid grid-cols-6 gap-8 mt-4">
        <!-- Detail -->
        <div class="col-span-4">
          <button class="flex bg-blue-200 py-2 px-4 rounded-full text-blue-700">
            About
          </button>
          <div class="mt-3 h-0.5 bg-neutral-50"></div>
          <!-- About -->
          <div class="mt-4">
            <div class="text-xl font-medium">About {{ service.name }}</div>
            <div class="flex gap-8 mt-6">
              <div class="flex flex-col items-center gap-1 p-4 rounded-lg">
                <div class="font-semibold text-lg">AC Berkualitas</div>
                <div class="text-sm text-neutral-300">100% ORI</div>
              </div>
              <div class="flex flex-col items-center gap-1 p-4 rounded-lg">
                <div class="font-semibold text-lg">Performa</div>
                <div class="text-sm text-neutral-300">Sangat Baik</div>
              </div>
              <div class="flex flex-col items-center gap-1 p-4 rounded-lg">
                <div class="font-semibold text-lg">Kerja Cepat</div>
                <div class="text-sm text-neutral-300">30 Menit</div>
              </div>
              <div class="flex flex-col items-center gap-1 p-4 rounded-lg">
                <div class="font-semibold text-lg">Pelayanan Baik</div>
                <div class="text-sm text-neutral-300">Sopan Santun</div>
              </div>
            </div>
            <div class="mt-6">
              {{ service.description }}
            </div>
          </div>
        </div>
        <!-- Order -->
        <div
          class="mt-8 col-span-2 border p-4 border-blue-100 rounded-lg h-min"
        >
          <div class="flex items-center gap-2">
            <div class="font-bold text-xl">Order Now</div>
          </div>
          <!-- Forms -->
          <form class="mt-4" @submit.prevent="submit">
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
            <div class="w-full mb-2 text-slate-300 text-sm">
              <div>Bayar Di Tempat</div>
            </div>

            <button
              type="submit"
              class="bg-blue-500 py-2 px-4 rounded-lg text-white text-lg hover:bg-blue-600"
            >
              Order Now
            </button>
          </form>
        </div>
      </div>
    </div>
  </App>
</template>

<script setup>
import { reactive } from "vue";
import App from "../../Layouts/App.vue";
import { router, useForm, usePage } from "@inertiajs/vue3";
const { service, user, orders, } = usePage().props;
const form = useForm({
  orderDate: null,
  phoneNumber: null,
  address: null,
});

    const checkOrderAvailable = orders?.filter((item) => item.order_status === 'on-going');





function submit() {
  if (!user) {
    alert("Please login your account");

  }else if (checkOrderAvailable.length > 0) {
    alert('Ada Order Yang belum terselesaikan')
  }else{
    form.post(`/${service.id}/order`, {
    onSuccess: () => {
      alert("Order Created");
    },
  });
  }


}
</script>
