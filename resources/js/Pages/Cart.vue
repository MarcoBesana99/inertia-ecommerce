<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cart</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <table class="table-auto w-full m-5">
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
                <td class="text-center">{{ product.id }}</td>
                <td class="text-center">{{ product.name }}</td>
                <td class="text-center">
                  <span class="mr-3">{{ product.sale_price }}$</span
                  ><span
                    class="text-red-600 line-through"
                    v-if="product.price > 0"
                    >{{ product.price }}$</span
                  >
                </td>
                <td class="text-center">
                  <cart-handler :product="product"></cart-handler>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4">Total: {{ total }}$</td>
              </tr>
            </tfoot>
          </table>
          <inertia-link
            :href="route('cart.clear')"
            method="post"
            as="button"
            type="button"
            preserve-scroll
            class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded"
            >Clear cart</inertia-link
          >
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import CartHandler from "@/Components/CartHandler";
import { computed } from "Vue";
import { usePage } from "@Inertiajs/Inertia-vue3";

export default {
  setup() {
    const cart = computed(() => usePage().props.value.cart);
    return { cart };
  },
  components: {
    AppLayout,
    CartHandler,
  },
  computed: {
    total: function () {
      return this.cart.products.reduce(
        (sum, product) => sum + product.sale_price * product.quantity,
        0
      );
    },
  },
};
</script>