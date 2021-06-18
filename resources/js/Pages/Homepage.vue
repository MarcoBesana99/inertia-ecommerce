<template>
  <base-layout>
    <nav-bar :canLogin="canLogin" :canRegister="canRegister"></nav-bar>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
      <h1>Our Products</h1>
      <div class="grid grid-cols-3 gap-4 mt-5">
        <div v-for="product in products" :key="product.id" class="bg-gray-300 shadow-xl rounded p-5">
          <div>
            <!-- <img :src="/img/" alt=""> -->
          </div>
          <div>
            <h2>{{ product.name }}</h2>
            <span>{{ product.sale_price }}</span>
            <span>{{ product.price }}</span>
          </div>
        </div>
      </div>
    </div>
  </base-layout>
</template>

<script>
import BaseLayout from "@/Layouts/BaseLayout";
import NavBar from "@/Components/NavBar";

export default {
  components: {
    BaseLayout,
    NavBar
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    products: Array
  },
};
</script>

<style lang="scss" scoped>
</style>