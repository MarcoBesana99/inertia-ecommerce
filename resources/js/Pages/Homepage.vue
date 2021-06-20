<template>
  <base-layout>
    <nav-bar :canLogin="canLogin" :canRegister="canRegister" :cart="cart"></nav-bar>
    <div
      class="
        w-full
        h-screen
        bg-no-repeat bg-cover bg-center bg-fixed
        hero
        pt-5
        bg-opacity-50
        relative
        z-10
      "
    >
      <div
        class="w-full h-screen bg-gray-400 bg-opacity-70 absolute z-10"
      ></div>
      <div
        class="
          w-full
          h-screen
          flex flex-col
          justify-center
          items-center
          z-20
          fixed
        "
      >
        <h1 class="text-white font-bold text-6xl">Inertia Ecommerce</h1>
        <p class="font-bold text-2xl text-white mt-8">
          This ecommerce project is build using Laravel, Inertia.js, Vue.js and
          Tailwind CSS.
        </p>
        <inertia-link
          href=""
          class="
            whitespace-nowrap
            inline-flex
            items-center
            justify-center
            px-4
            py-2
            border border-transparent
            rounded-md
            shadow-sm
            text-base
            font-medium
            text-white
            bg-indigo-600
            hover:bg-indigo-700
            transition-all
            ease-in
            duration-75
            mt-8
          "
        >
          See our products
        </inertia-link>
      </div>
    </div>
    <div
      class="max-w-7xl mx-auto px-6 lg:px-8 py-6 bg-indigo-300 relative z-20"
    >
      <h1>Our Products</h1>
      <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 mt-5">
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
    NavBar,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    products: Array,
    cart: Array,
  },
};
</script>

<style scoped>
.hero {
  background-image: url("/img/hero.jpg");
}
</style>