<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cart</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <table class="table-auto">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(product, index) in cart.products" :key="index">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td><cart-handler :product="product"></cart-handler></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import CartHandler from "@/Components/CartHandler";
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default {
  setup() {
    const cart = computed(() => usePage().props.value.cart);
    return { cart };
  },
  components: {
    AppLayout,
    CartHandler
  },
};
</script>