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
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { computed } from "Vue";
import { usePage } from "@Inertiajs/Inertia-vue3";

export default {
    setup() {
    const isAdmin = computed(() => usePage().props.value.is_admin);
    return { isAdmin };
  },
  components: {
    AppLayout,
  },
};
</script>
