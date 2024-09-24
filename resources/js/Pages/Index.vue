<script setup>

</script>

<template>
  <Head title="Home" />
  <h1 class="title">Hello, {{ $page.props.auth.user ? $page.props.auth.user.name : 'Guest' }}</h1>
</template>
