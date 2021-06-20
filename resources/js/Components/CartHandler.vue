<template>
  <div class="cart-handler">
    <inertia-link
      v-if="quantity"
      :href="'/cart/remove/' + product.id"
      method="post"
      as="button"
      type="button"
      preserve-scroll
      class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded"
      >-</inertia-link
    >
    <span class="p-4">{{ quantity ? quantity : 0 }}</span>
    <inertia-link
      :href="'/cart/add/' + product.id"
      method="post"
      as="button"
      type="button"
      preserve-scroll
      class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded"
      >+</inertia-link
    >
  </div>
</template>

<script>
import { computed } from "Vue";
import { usePage } from "@Inertiajs/Inertia-vue3";

export default {
  setup() {
    const cart = computed(() => usePage().props.value.cart);
    return { cart };
  },
  props: {
    product: Object,
  },
  methods: {
    checkIfInCart: function () {
      if (
        this.cart.products.find((element) => {
          return element.id == this.product.id;
        })
      )
        return true;
      else false;
    },
  },
  computed: {
    quantity: function () {
      if (this.checkIfInCart()) {
        return this.cart.products.find((element) => {
          return element.id == this.product.id;
        }).quantity;
      } else return 0;
    },
  },
};
</script>