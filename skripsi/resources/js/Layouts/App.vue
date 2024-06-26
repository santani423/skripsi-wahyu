<template>
    <main>
        <Head :title="'Service AC '" />
        <div>
            <div class="flex flex-col min-h-screen">
                <main class="px-4 md:px-12 flex-grow">
                  <Navbar />
                <slot />
                </main>
                <div class="mt-auto">
                  <Footer />
                </div>

            </div>

            <div v-if="loader">
                <LoaderVue />
            </div>
        </div>
    </main>
</template>
<script setup>
import { Head, router } from "@inertiajs/vue3";
import LoaderVue from "../Components/Loader.vue";
import { ref } from "vue";
import Navbar from "../Components/Navbar.vue";
import Footer from "../Components/Footer.vue";

// defineProps({ title: String });
const loader = ref(false);

router.on("start", () => {
    loader.value = true;
});

router.on("finish", () => (loader.value = false));
</script>
