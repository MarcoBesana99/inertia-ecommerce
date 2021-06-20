<template>
  <div
          v-for="product in products"
          :key="product.id"
          class="bg-gray-300 shadow-xl rounded"
        >
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
            :href="'/cart/add/' + product.id"
            method="post"
            as="button"
            type="button"
            preserve-scroll
            >Add</inertia-link
          >
        </div>
</template>

<script>
export default {
  props : {
    products : Array
  }
}
</script>