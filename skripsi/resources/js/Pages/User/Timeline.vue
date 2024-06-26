<template>
    <App>
        <div class="mt-4 pb-20">
            <div class="font-bold text-xl">Timeline And Payment Status</div>

            <div class="grid grid-cols-4 mt-4 gap-4">
                <!-- Cards -->
                <div v-for="(timeline,i) in timelines" class=" p-4 rounded-lg flex justify-center items-center gap-4" :key="i" :class="timeline.name == order.timeline_value ? 'bg-blue-500 text-white' : 'bg-slate-200'">
                    <div>{{ timeline.name}}</div>
                </div>
            </div>
        </div>
    </App>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import App from '../../Layouts/App.vue';

const {timelines,order} = usePage().props


</script>
