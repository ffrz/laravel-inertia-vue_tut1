<script setup>
defineProps({
  user: Object
})
</script>

<template>
  <h1 class="text-red-800 font-bold text-6xl">Hello, {{ user.fullname }}!</h1>
</template>
