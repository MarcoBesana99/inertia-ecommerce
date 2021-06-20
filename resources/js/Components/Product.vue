<template>
  <div class="bg-gray-300 shadow-xl rounded">
    <div>
      <img
        class="w-full"
        :src="/img/ + product.image_path"
        :alt="product.name"
      />
    </div>
    <div class="p-5">
      <h2 class="font-bold text-lg">{{ product.name }}</h2>
      <span>{{ product.sale_price }}</span>
      <span v-if="product.price > 0">{{ product.price }}</span>
    </div>
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
export default {
  props: {
    product: Object,
    cart: Object,
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