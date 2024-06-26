<template>
  <App>
    <div class="mt-4 pb-20">
      <div class="font-bold text-xl">Payment Info</div>
      <!-- Price -->
      <div
        class="my-6 flex gap-4 justify-center p-4 font-semibold text-xl border-b"
      >
        <div class="text-center bg-blue-100 p-6 rounded-lg flex flex-col gap-3">
          <div>Total Price</div>
          <div>{{getPaymentDp.length && getPaymentDp[0].status === 'paid'? formatToRupiah(totalPriceMinusDp(order.data.service.price))  : formatToRupiah(parseInt(order.data.service.price)) }}</div>
        </div>
        <div
          class="text-center bg-green-100 p-6 rounded-lg flex flex-col gap-3" :class="{'line-through' : getPaymentDp.length && getPaymentDp[0].status === 'paid' }"
        >
          <div>Down Payment (DP)</div>
          <div>{{ countDp }}</div>
        </div>
      </div>
      <div class="text-center mb-4 text-xl">
        <div class="font-semibold">On Behalf</div>
        <div class="font-bold">PT Service AC XYZ</div>
      </div>
      <!-- Bank Details -->
      <div class="bg-blue-100 grid grid-cols-2 gap-4 p-4 w-full mb-8">
        <div
          class="flex gap-20 p-4 items-center text-2xl font-semibold justify-center w-full"
        >
          <img :src="BCA" alt="bca-icon" class="h-20 w-32" />
          <div>
            <div>8787 8778 989</div>
            <span class="text-green-500 cursor-pointer">Salin</span>
          </div>
        </div>
        <div
          class="flex gap-20 p-4 items-center text-2xl font-semibold justify-center w-full"
        >
          <img :src="BRI" alt="bri-icon" class="h-20 w-32" />
          <div>
            <div>8787 8778 989</div>
            <span class="text-green-500 cursor-pointer">Salin</span>
          </div>
        </div>
        <div
          class="flex gap-20 p-4 items-center text-2xl font-semibold justify-center w-full"
        >
          <img :src="MANDIRI" alt="bri-icon" class="h-20 w-32" />
          <div>
            <div>8787 8778 989</div>
            <span class="text-green-500 cursor-pointer">Salin</span>
          </div>
        </div>
        <div
          class="flex gap-20 p-4 items-center text-2xl font-semibold justify-center w-full"
        >
          <img :src="DANA" alt="dana-icon" class="h-20 w-32" />
          <div>
            <div>8787 8778 989</div>
            <span class="text-green-500 cursor-pointer">Salin</span>
          </div>
        </div>
      </div>
      <div class="text-xl font-bold text-center">Payment Confirmation</div>
    <form class="mx-8 mb-12" @submit.prevent="submit">
      <div class="grid grid-cols-2 mt-8 gap-4">
        <div>
          <!-- Type -->
          <div class="mb-4 mt-4">
            <select v-model="form.paymentType" class="border-neutral-100 w-full rounded-lg">
              <option value="" disabled selected>
                Type Payment
              </option>
              <option value="dp" :class="{'hidden' : getPaymentDp.length === 1}">DP</option>
              <option value="paid-off">Paid Off</option>
            </select>
            <div v-if="form.errors.paymentType" class="text-red-500 my-2">
              {{ form.errors.paymentType }}
            </div>
          </div>
          <!-- Bank -->
          <div class="mb-4 mt-4">
            <select v-model="form.bankName" class="border-neutral-100 w-full rounded-lg">
              <option value="" disabled selected>
                Select Your Bank
              </option>
              <option value="BCA">BCA</option>
              <option value="BNI">BNI</option>
              <option value="MANDIRI">MANDIRI</option>
              <option value="BRI">BRI</option>
            </select>
            <div v-if="form.errors.bankName" class="text-red-500 my-2">
              {{ form.errors.bankName }}
            </div>
          </div>
          <!-- Rek -->
          <div class="mb-4">
            <input type="text" v-model="form.accountNumber" class="border-neutral-100 w-full rounded-lg"
              placeholder="No Rekening" />
              <div v-if="form.errors.accountNumber" class="text-red-500 my-2">
            {{ form.errors.accountNumber }}
          </div>
          </div>
          <!-- Name -->
          <div class="mb-4">
            <input type="text" v-model="form.name" class="border-neutral-100 w-full rounded-lg" placeholder="Name" />
            <div v-if="form.errors.name" class="text-red-500 my-2">
            {{ form.errors.name }}
          </div>
          </div>
          <!-- Phone Number -->
          <div class="mb-4">
            <input type="text" v-model="form.phoneNumber" class="border-neutral-100 w-full rounded-lg"
              placeholder="Phone Number" />
          </div>
          <div v-if="form.errors.phoneNumber" class="text-red-500 my-2">
            {{ form.errors.phoneNumber }}
          </div>
        </div>
        <!-- Images -->
        <div>
          <div class="flex justify-center items-center border h-80">
          <!-- Preview -->
          <img :src="imagePreview" alt="preview" class="object-cover" :class="{'hidden' : !imagePreview }">
          <!-- Upload -->
          <label for="upload_tf" class="cursor-pointer" :class="{'hidden' : imagePreview}">
            Upload Image</label>
          <input type="file" id="upload_tf" class="hidden"  @input="form.imageTransfer = $event.target.files[0]" @change="preview"/>
        </div>
        <label for="upload_tf" class="cursor-pointer text-center flex justify-center items-center gap-2 mt-4"  :class="{'hidden' : !imagePreview }">
            Upload Image</label>

        </div>

        <div>
          <button type="submit" class="bg-blue-500 py-2 px-4 text-neutral-0 rounded-lg font-semibold text-">
            I Already Paid</button>
        </div>
      </div>
    </form>
    </div>
  </App>
</template>

<script setup>
import App from "../../Layouts/App.vue";
import { ref } from "vue";
import BCA from "../../Assets/BCA.png";
import BRI from "../../Assets/BRI.png";
import MANDIRI from "../../Assets/MANDIRI.png";
import DANA from "../../Assets/DANA.png";
import { useForm, usePage } from "@inertiajs/vue3";

const {order,payment} = usePage().props

const form = useForm({
  paymentType: "",
  bankName: "",
  accountNumber: "",
  name: "",
  phoneNumber: "",
  imageTransfer: ""
})

const imagePreview = ref('')
const preview = (e) => {
  const file = event.target.files[0];
  if (file && file.type.includes("image/")) {
    form.image = file; // Menyimpan gambar yang diunggah ke field form
    // Membaca file gambar menggunakan FileReader
    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.value = e.target.result; // Menyimpan URL gambar ke field state
    };
    reader.readAsDataURL(file);
  }
}

const countDp = ref(formatToRupiah(parseInt(order.data.service.price / 100 * 20)))
const getPaymentDp = payment.filter((item) => item.payment_type == 'dp' && item.status == 'paid')

const totalPriceMinusDp = (price) => {
  const totalPrice = price - (order.data.service.price / 100 * 20)
  return totalPrice
}

function formatToRupiah(amount) {
  return amount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}

function submit() {
  form.post(`/${order.data.id}/payment`, {
    onSuccess: () => {
      alert('Success Update Payment')
    }
  })
}


</script>
