<template >
    <main>
      <Head :title="'Service AC'" />

      <div>
        <div class="flex gap-6 bg-neutral-50 min-h-screen">
          <div class="flex-none w-[300px]">
            <Sidebar />
          </div>
          <div class="flex-1 my-8 bg-neutral-50 relative">
            <div class="bg-neutral-0 mr-6 rounded-main p-8 min-h-screen">
              <slot />
            </div>
          </div>
        </div>
        <div v-if="loader">
        <LoaderVue />
      </div>
      </div>
    </main>
  </template>
  <script setup >
  import Sidebar from "../Components/Sidebar.vue";
  import { Head, router } from "@inertiajs/vue3";
  import LoaderVue from "../Components/Loader.vue";
  import { ref } from "vue";
  defineProps({ title: String });
  const loader = ref(false);

  router.on("start", () => {
    loader.value = true;
  });

  router.on('finish' , () => loader.value = false)
  </script>
