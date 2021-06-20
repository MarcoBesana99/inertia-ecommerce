<template>
  <div class="bg-gray-300 shadow-xl rounded product">
    <div>
      <img
        class="w-full rounded"
        :src="/img/ + product.image_path"
        :alt="product.name"
      />
    </div>
    <div class="py-3 flex items-center justify-center flex-col">
      <h2 class="font-bold text-lg">{{ product.name }}</h2>
      <div>
        <span class="mr-2">{{ product.sale_price }}$</span>
        <span v-if="product.price > 0" class="text-red-600 line-through"
          >{{ product.price }}$</span
        >
      </div>
    </div>
    <cart-handler v-if="authenticated" :product="product"></cart-handler>
    <span v-else class="text-yellow-600 font-bold text-center py-3 flex justify-center items-center"
      >Log in to add to cart</span
    >
  </div>
</template>

<script>
import CartHandler from "@/Components/CartHandler";
import { computed } from "Vue";
import { usePage } from "@Inertiajs/Inertia-vue3";

export default {
  setup() {
    const cart = computed(() => usePage().props.value.cart);
    const authenticated = computed(() => usePage().props.value.authenticated);
    return { cart, authenticated };
  },
  components: {
    CartHandler,
  },
  props: {
    product: Object,
  },
};
</script>
<style scoped>
.product .cart-handler {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}
</style>