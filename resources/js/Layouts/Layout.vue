<script setup>
</script>

<template>
  <div>
    <header class="bg-indigo-800 text-white">
      <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
        <div>
          <h1 class="font-bold">{{ $page.props.auth.user.fullname }}</h1>
        </div>
        <div class="space-x-6">
          <Link :href="route('home')">Home</Link>
          <Link :href="route('about')">About</Link>
          <Link :href="route('contact')">Contact</Link>
        </div>
      </nav>
    </header>
    <main class="max-w-screen-lg mx-auto p-4">
      <slot></slot>
    </main>
  </div>
</template>
