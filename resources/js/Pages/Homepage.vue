<template>
  <base-layout>
    <nav-bar :canLogin="canLogin" :canRegister="canRegister"></nav-bar>
    <div>ciao</div>
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
  },
};
</script>

<style lang="scss" scoped>
</style>