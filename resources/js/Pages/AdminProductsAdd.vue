<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Add a product
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex justify-center">
          <form @submit.prevent="submit" class="flex flex-col p-4 w-full md:w-3/4 lg:w-2/4">
            <label for="name">Product name:</label>
            <input class="bg-blue-100 p-2 focus:ring-blue-600 focus-visible:ring-blue-600 border outline-none focus:ring-1 border-blue-600 rounded mt-2" id="name" v-model="form.name" />
            <div class="text-red-600 font-semibold" v-if="form.errors.name">{{ form.errors.name }}</div>
            <label class="mt-2" for="description">Description</label>
            <textarea class="bg-blue-100 p-2 focus:ring-blue-600 focus-visible:ring-blue-600 border outline-none focus:ring-1 border-blue-600 rounded mt-2" id="description" v-model="form.description" ></textarea>
            <div class="text-red-600 font-semibold" v-if="form.errors.description">{{ form.errors.description }}</div>
            <label class="mt-2" for="category">Category:</label>
            <input class="bg-blue-100 p-2 focus:ring-blue-600 focus-visible:ring-blue-600 border outline-none focus:ring-1 border-blue-600 rounded mt-2" id="category" v-model="form.category_id" />
            <div class="text-red-600 font-semibold" v-if="form.errors.category_id">{{ form.errors.category_id }}</div>
            <label class="mt-2" for="price">Price:</label>
            <input class="bg-blue-100 p-2 focus:ring-blue-600 focus-visible:ring-blue-600 border outline-none focus:ring-1 border-blue-600 rounded mt-2" id="price" v-model="form.price" />
            <div class="text-red-600 font-semibold" v-if="form.errors.price">{{ form.errors.price }}</div>
            <label class="mt-2" for="salePrice">Sale price:</label>
            <input class="bg-blue-100 p-2 focus:ring-blue-600 focus-visible:ring-blue-600 border outline-none focus:ring-1 border-blue-600 rounded mt-2" id="salePrice" v-model="form.sale_price" />
            <div class="text-red-600 font-semibold" v-if="form.errors.sale_price">{{ form.errors.sale_price }}</div>
            <label class="mt-2" for="quantity">Quantity:</label>
            <input class="bg-blue-100 p-2 focus:ring-blue-600 focus-visible:ring-blue-600 border outline-none focus:ring-1 border-blue-600 rounded mt-2" id="quantity" v-model="form.quantity" />
            <div class="text-red-600 font-semibold" v-if="form.errors.quantity">{{ form.errors.quantity }}</div>
            <button type="submit" class="mt-3 shadow focus:ring-1 focus:outline-none focus:border-blue-800 border border-blue-800 bg-blue-500 transition duration-500 ease-in-out hover:bg-blue-800 p-2 text-white w-full rounded">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  setup () {
    const form = useForm({
      name: null,
      description: null,
      category_id: null,
      price: null,
      sale_price: null,
      quantity: null,
    })

    function submit() {
      form.post(route('admin.products.store'))
    }

    return { form, submit }
  },
  components: {
    AppLayout,
  },
};
</script>
