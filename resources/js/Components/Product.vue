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
    <cart-handler :product="product"></cart-handler>
  </div>
</template>

<script>
import CartHandler from '@/components/CartHandler'
export default {
  components : {
    CartHandler
  },
  props: {
    product: Object
  }
};
</script>