<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div
            v-if="flash"
            v-show="elementVisible"
            class="bg-red-300 text-red-700 font-bold text-center p-5"
          >
            {{ flash }}
          </div>
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
    let flash = computed(() => usePage().props.value.flash.access_denied);
    return { flash };
  },
  data() {
    return {
      elementVisible: true,
    };
  },
  components: {
    AppLayout,
  },
  created() {
    setTimeout(() => (this.elementVisible = false), 5000);
  },
};
</script>
