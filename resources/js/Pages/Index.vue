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
  <Head title="Home" />
  <h1 class="text-4xl">Hello, {{ user.fullname }}!</h1>
</template>
