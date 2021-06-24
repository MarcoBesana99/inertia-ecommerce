<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Products
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <inertia-link
            v-if="isAdmin"
            :href="route('admin.products.create')"
            class="
              inline-flex
              items-center
              justify-center
              px-4
              py-2
              border border-transparent
              rounded-md
              text-base
              font-medium
              text-white
              bg-indigo-600
              hover:bg-indigo-700
            "
          >
            Add a product
          </inertia-link>

          <table class="table w-full">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product sale price</th>
            <th>Product full price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products.data" :key="product.id">
            <td>{{ product.id }}</td> 
            <td>{{ product.name }}</td>
            <td>{{ product.sale_price }}</td>
            <td>{{ product.price }}</td>
          </tr>
        </tbody>
      </table>

          <pagination class="mt-6" :links="products.links" />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { computed } from "Vue";
import { usePage } from "@Inertiajs/Inertia-vue3";
import Pagination from '@/Components/Pagination'

export default {
    setup() {
    const isAdmin = computed(() => usePage().props.value.is_admin);
    return { isAdmin };
  },
  components: {
    AppLayout,
    Pagination
  },
  props: {
    products : Object
  }
};
</script>
