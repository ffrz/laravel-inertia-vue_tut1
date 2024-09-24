<script setup>

import PaginationLinks from '../Components/PaginationLinks.vue';

defineProps({
  users: {
    type: Object,
    required: true,
  }
});

const formatDate = (date) => {
  return new Date(date).toLocaleDateString('en-us', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  });
}


</script>

<template>

  <Head title="Users" />
  <table>
    <thead>
      <tr>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date Registered</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in users.data" :key="user.id">
        <td><img :src="user.avatar ? 'storage/' + user.avatar : 'storage/avatars/default.png'" class="avatar"></td>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ formatDate(user.created_at) }}</td>
      </tr>
    </tbody>
  </table>
  <div>
    <PaginationLinks :paginator="users" />
  </div>
</template>
