<template>
  <AppAdmin>
    <div class="text-2xl font-semibold">Timelines Management</div>
    <div class="my-8">
      <Link
        href="/admin/timelines/create"
        class="bg-blue-500 py-2 px-4 text-base text-white rounded-lg"
        >Create New Timelines
      </Link>
      <!-- Table -->
      <div class="flex flex-col mt-4">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr class="text-center">
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Name</th>
                    <th scope="col" class="px-6 py-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(timeline, i) in timelines"
                    class="border-b dark:border-neutral-500 text-center"
                    :key="i"
                  >
                    <td class="px-6 py-4 font-medium">{{ i + 1 }}</td>
                    <td class="px-6 py-4">
                      {{ timeline.name }}
                    </td>
                    <td class="px-6 py-4">
                      <div class="flex gap-2 justify-center text-white">
                        <Link
                          :href="'/admin/timelines/' + timeline.id"
                          class="bg-green-500 py-2 px-4 rounded-lg"
                        >
                          Edit
                        </Link>
                        <button
                          @click.prevent="destroy(`${timeline.id}`)"
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

const form = useForm({});

const { timelines } = usePage().props;

function destroy($id) {
  confirmDelete({
    text: "Apa anda yakin menghapus timeline?",
    then: (result) => {
      if (result.isConfirmed) {
        form.delete(`/admin/timelines/${$id}`, {
          onSuccess: () => {
            alert("Timeline Deleted");
            router.visit("/admin/timelines", { only: ["timelines"] });
          },
        });
      }
    },
  });
}
</script>
