<script setup>
</script>

<template>
  <div>
    <header>
      <nav>
        <div class="space-x-6">
          <Link :href="route('home')">Home</Link>
        </div>
        <div class="space-x-6">
          <Link :href="route('register')">Register</Link>
          <Link :href="route('login')">Login</Link>
        </div>
      </nav>
    </header>
    <main class="max-w-screen-lg mx-auto p-4">
      <slot></slot>
    </main>
  </div>
</template>
