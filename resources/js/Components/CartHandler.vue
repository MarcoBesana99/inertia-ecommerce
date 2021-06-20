<template>
  <div>
    <inertia-link
      v-if="quantity"
      :href="'/cart/remove/' + product.id"
      method="post"
      as="button"
      type="button"
      preserve-scroll
      >-</inertia-link
    >
    <span>{{ quantity ? quantity : 0 }}</span>
    <inertia-link
      :href="'/cart/add/' + product.id"
      method="post"
      as="button"
      type="button"
      preserve-scroll
      >+</inertia-link
    >
  </div>
</template>

<script>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

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