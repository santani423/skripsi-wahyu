<template>
  <App>
    <div class="mt-4 text-xl font-sans font-semibold antialiased">
      Service AC Menjadi Mudah Dan Simple
    </div>
    <div class="my-6">
      <div class="grid  sm:grid-cols-2 xl:grid-cols-3 gap-4">
        <!-- Cards -->
        <Link :href="'/' + service.slug + '/detail'"
          class="shadow-lg contrast-75 text-neutral-300 rounded-lg hover:shadow-2xl hover:contrast-100 hover:text-neutral-500 cursor-pointer"
        v-for="(service,i) in services" :key="i"
          >
        <!-- Image Card -->
         <img :src="'/storage/images/services/' + service.image_url"  alt="venue-img" class="rounded-lg h-[200px] w-full object-fill" />
        <!-- Detail Card -->
        <div class="px-4">
          <div class="flex my-4 items-center gap-2">
            <font-awesome-icon icon="building-user" />
            {{ service.name }}
          </div>
          <div class="flex my-4 items-center gap-2">
            <font-awesome-icon icon="rupiah-sign" />
            <div>0-{{ formatToRupiah(parseInt(service.price )) }}</div>
          </div>
        </div>
        </Link>

      </div>
    </div>
  </App>
</template>

<script setup>
import App from "../../Layouts/App.vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faBuildingUser, faUsers, faRupiahSign } from "@fortawesome/free-solid-svg-icons";
import { Link, usePage } from "@inertiajs/vue3";
library.add([faBuildingUser, faUsers, faRupiahSign]);

const {services} = usePage().props

function formatToRupiah(amount) {
  return amount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}

</script>

<style>
</style>
