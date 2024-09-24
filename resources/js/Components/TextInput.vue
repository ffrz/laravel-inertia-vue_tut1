<script setup>
const model = defineModel({
  type: null,
  required: true,
})

defineProps({
  label: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: 'text',
  },
  error: String,
})
</script>
<template>
  <div>
    <label>{{ label }}</label>
    <input :type="type" v-model="model" :class="{ '!ring-red-500': error }" />
    <p class="error" v-if="error">{{ error }}</p>
  </div>
</template>
