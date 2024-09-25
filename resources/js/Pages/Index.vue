<script setup>
import { watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import PaginationLinks from '../Components/PaginationLinks.vue';
import { debounce } from 'lodash';

const props = defineProps({
  users: Object,
  search:String,
  can: Object
});

const formatDate = (date) => {
  return new Date(date).toLocaleDateString('en-us', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  });
}

const search = ref(props.search);

watch(search, debounce((q) => router.get('/', { search: q }, { preserveState: true }), 500));

</script>

<template>

  <Head title="Users" />
  <div class="flex justify-end mb-4">
    <div class="w-1/4">
      <input type="search" placeholder="Search" v-model="search">
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date Registered</th>
        <th v-if="can.delete_user">Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in users.data" :key="user.id">
        <td><img :src="user.avatar ? 'storage/' + user.avatar : 'storage/avatars/default.png'" class="avatar"></td>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ formatDate(user.created_at) }}</td>
        <td v-if="can.delete_user"><button class="bg-red-600 w-6 h-6 rounded-full"></button></td>
      </tr>
    </tbody>
  </table>
  <div>
    <PaginationLinks :paginator="users" />
  </div>
</template>
