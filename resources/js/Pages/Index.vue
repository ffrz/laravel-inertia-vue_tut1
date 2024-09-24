<script setup>
import AuthLayout from '../Layouts/AuthLayout.vue';

defineProps({
  user: Object
})

defineOptions({
  layout: AuthLayout
})

</script>

<template>
  <h1 class="text-red-800 font-bold text-6xl">Hello, {{ user.fullname }}!</h1>
</template>
