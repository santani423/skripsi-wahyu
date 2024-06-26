<template lang="">
    <div class="bg-white shadow-[0px_4px_140px_0px_A6A6A6]">
        <div class="w-[300px] flex flex-col h-screen justify-between fixed">
            <div class="h-[90vh] sidebar-profile-menu overflow-x-scroll">
            <div>
                <div class="mt-12 text-center text-2xl font-bold">
                    CV PANDAN TEHNIK
                </div>
                <div class="text-center text-sm font-medium"> Service Ac Management </div>
             </div>
             
                <!-- List Item -->
                <div class="sidebar-menu">
                    <ul
                        class="w-full text-neutral-200 flex sticky top-0 flex-col mt-[20px]"
                    >
                        <!-- dashboard -->
                        <Link
                            href="/admin/dashboard"
                            class="py-3 hover:bg-neutral-50 px-8"
                            :class="{
                                active: $page.url.startsWith(
                                    '/admin/dashboard'
                                ),
                            }"
                        >
                            <div class="flex gap-3 items-center">
                                <div><font-awesome-icon icon="house" /></div>
                                <div class="text-neutral-500">Dashboard</div>
                            </div>
                        </Link>
                        <!-- Services -->
                        <Link
                            href="/admin/services"
                            class="py-3 hover:bg-neutral-50 px-8"
                            :class="{
                                active: $page.url.startsWith(
                                    '/admin/services'
                                ),
                            }"
                        >
                            <div class="flex gap-3 items-center">
                                <div><font-awesome-icon icon="list" /></div>
                                <div class="text-neutral-500">List Services</div>
                            </div>
                        </Link>
                        <!-- Orders -->
                        <Link
                            href="/admin/orders"
                            class="py-3 hover:bg-neutral-50 px-8"
                            :class="{
                                active: $page.url.startsWith(
                                    '/admin/orders'
                                ),
                            }"
                        >
                            <div class="flex gap-3 items-center">
                                <div><font-awesome-icon icon="dollar-sign" /></div>
                                <div class="text-neutral-500">Orders</div>
                            </div>
                        </Link>
                        <!-- Timelines -->
                        <Link
                            href="/admin/timelines"
                            class="py-3 hover:bg-neutral-50 px-8"
                            :class="{
                                active: $page.url.startsWith(
                                    '/admin/timelines'
                                ),
                            }"
                        >
                            <div class="flex gap-3 items-center">
                                <div><font-awesome-icon icon="rectangle-list" /></div>
                                <div class="text-neutral-500">Timelines</div>
                            </div>
                        </Link>
                    </ul>
                </div>
            </div>
            <!-- Logout -->
            <div class="bg-[#f8f8f8] flex items-center gap-3 px-8">
                <div>
                    <font-awesome-icon icon="right-from-bracket" />
                </div>
                <div>
                    <button
                        class="w-full py-4 text-[#8E8E8E] sub-sm-semibold"
                        @click.prevent="logout"
                    >
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faRightFromBracket,
    faHouse,
    faDollarSign,
    faList,
    faRectangleList
} from "@fortawesome/free-solid-svg-icons";
library.add([faRightFromBracket, faHouse, faDollarSign, faList,faRectangleList]);

const page = usePage().props;

function logout() {
    router.post("/admin/logout");
}
</script>

<style>
.active {
    background: #f5f5f5;
    border-left: 3px solid #3b82f6;
}
</style>
