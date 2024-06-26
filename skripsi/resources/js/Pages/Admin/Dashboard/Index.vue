<template>
    <AppAdmin>
       	<div class="grid grid-cols-3 gap-4 w-full"> 
       		<div class="bg-green-500 p-6 text-white rounded-lg"> 
       				<div class="text-center text-md uppercase font-bold">Total Users</div> 
       				<div class="mt-[2rem] text-center text-4xl"> {{users}} </div>
       			</div>
       			<Link href="/admin/orders" class="bg-blue-500 p-6 text-white rounded-lg "> 
       				<div class="text-center text-md uppercase font-bold">Total Transaction Success </div> 
       				<div class="mt-[2rem] text-center text-4xl"> {{orderSuccess}} </div>
       			</Link>
			<Link href="/admin/orders" class="bg-red-500 p-6 text-white rounded-lg"> 
       				<div class="text-center text-md uppercase font-bold ">Total Transaction On Going </div> 
       				<div class="mt-[2rem] text-center text-4xl"> {{orderOnGoing}} </div>
       		</Link>
       	 </div>
    </AppAdmin>
</template>

<script setup>
import AppAdmin from "../../../Layouts/AppAdmin.vue";
import { Link,usePage } from "@inertiajs/vue3";

const {users, orderSuccess, orderOnGoing} = usePage().props


</script>

<style>

</style>
