<template>
  <AppAdmin>
    <div class="text-2xl font-semibold">Orders Management</div>
    <div class="my-8">
      <Link
        href="/admin/orders/create"
        class="bg-blue-500 py-2 px-4 text-base text-white rounded-lg"
        >Create New Orders
      </Link>
      <!-- Table -->
      <div class="flex flex-col mt-4">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="table-auto min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr class="text-center">
                    <th scope="col" class="px-6 py-4">Name</th>
                    <th scope="col" class="px-6 py-4">Service Name</th>
                    <th scope="col" class="px-6 py-4">Order Date</th>
                    <th scope="col" class="px-6 py-4">Phone Number</th>
                    <th scope="col" class="px-6 py-4">Address</th>
                    <th scope="col" class="px-6 py-4">Last timeline</th>
                    <th scope="col" class="px-6 py-4">Order Status</th>
                    <th scope="col" class="px-6 py-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(order, i) in orders.data"
                    class="border-b dark:border-neutral-500 text-center"
                    :key="i"
                  >

                    <td class="px-6 py-4">
                      {{ order.user.name }}
                    </td>
                    <td class="px-6 py-4">
                      {{ order.service.name }}
                    </td>
                    <td class="px-6 py-4">
                      {{ order.orderDate }}
                    </td>
                    <td class="px-6 py-4">
                      {{ order.phoneNumber }}
                    </td>
                    <td class="px-6 py-4 " >
                      {{ order.address }}
                    </td>
                    <td class="px-6 py-4">
                      {{ order.timelineValue }}
                    </td>
                    <td class="px-6 py-4">
                      {{ order.orderStatus }}
                    </td>
                    <td class="px-6 py-4">
                      <div class="flex gap-2 justify-center text-white">
                        <Link
                          :href="'/admin/orders/' + order.id + '/payment'"
                          class="bg-blue-500 py-2 px-4 rounded-lg"
                        >
                          Payment
                        </Link>
                        <Link
                          :href="'/admin/orders/' + order.id + '/edit'"
                          class="bg-green-500 py-2 px-4 rounded-lg"
                        >
                          Edit
                        </Link>
                        <Link
                          :href="'/admin/orders/' + order.id + '/update-timeline'"
                          class="bg-yellow-500 py-2 px-4 rounded-lg"
                        >
                          Timeline
                        </Link>
                        <button
                          @click.prevent="destroy(`${order.id}`)"
                          class="bg-red-500 py-2 px-4 rounded-lg"
                        >
                          Delete
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppAdmin>
</template>

<script setup>
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
import AppAdmin from "../../../Layouts/AppAdmin.vue";
import { confirmDelete } from "../../../Components/ConfirmDialog.vue";
const {orders} = usePage().props


const form = useForm({})

function destroy($id) {
  confirmDelete({
    text: "Apa anda yakin menghapus order?",
    then: (result) => {
      if (result.isConfirmed) {
        form.delete(`/admin/orders/${$id}/delete`, {
          onSuccess: () => {
            alert("Order Deleted");
            router.visit("/admin/orders", { only: ["orders"] });
          },
        });
      }
    },
  });
}
</script>
