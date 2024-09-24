<script setup>
import { onMounted } from 'vue';

defineProps({
  paginator: {
    type: Object,
    required: true,
  }
});

const makeLabel = (label) => {
  if (label.includes("Previous")) {
    return "<<";
  }
  else if (label.includes("Next")) {
    return ">>";
  }
  else {
    return label;
  }
}

</script>

<template>
  <div class="flex justify-between items-start">
    <div class="flex items-center rounded-md overflow-hidden shadow-lg">
      <div v-for="link in paginator.links" :key="link.url">
        <component :is="link.url ? 'Link' : 'span'" v-html="makeLabel(link.label)"
        :href="link.url ?? link.url"
          class="border-x border-slate-50 w-8 h-8 grid place-items-center bg-white" :class="{
            'hover:bg-slate-300': link.url,
            'text-zinc-400': !link.url,
            'bg-blue-300 text-gray-800': link.active,
          }" />
      </div>
    </div>
    <p>Showing {{ paginator.from }} to {{ paginator.to }} from {{ paginator.total }}</p>
  </div>
</template>
