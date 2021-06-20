<template>
  <div class="bg-gray-300 shadow-xl rounded product">
    <div>
      <img
        class="w-full"
        :src="/img/ + product.image_path"
        :alt="product.name"
      />
    </div>
    <div class="p-5">
      <h2 class="font-bold text-lg">{{ product.name }}</h2>
      <span class="mr-2">{{ product.sale_price }}$</span>
      <span v-if="product.price > 0" class="text-red-600 line-through">{{ product.price }}$</span>
    </div>
    <cart-handler :product="product"></cart-handler>
  </div>
</template>

<script>
import CartHandler from '@/Components/CartHandler'
export default {
  components : {
    CartHandler
  },
  props: {
    product: Object
  }
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