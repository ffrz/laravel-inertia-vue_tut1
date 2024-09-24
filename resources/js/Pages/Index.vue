<script setup>

</script>

<template>

  <Head title="Home" />
  <h1 class="text-4xl">Hello, {{ $page.props.auth.user.fullname }}!</h1>
  <div class="mt-[600px]">
    <Link class="" :href="route('home')" preserve-scroll>Refresh</Link>
  </div>
</template>
