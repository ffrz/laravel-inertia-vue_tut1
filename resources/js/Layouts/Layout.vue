<script setup>

</script>

<template>
  <div>
    <header>
      <nav>
        <div class="space-x-6">
          <Link :href="route('home')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Index' }">Home
          </Link>
        </div>
        <div v-if="$page.props.auth.user" class="space-x-6 flex">
          <img :src="$page.props.auth.user.avatar ? 'storage/' + $page.props.auth.user.avatar : 'storage/avatars/default.png'"
            class="avatar" />
          <Link :href="route('dashboard')" class="nav-link"
            :class="{ 'bg-slate-700': $page.component === 'Dashboard' }">Dashboard</Link>
          <Link method="post" type="button" as="button" :href="route('logout')" class="nav-link">Logout</Link>
        </div>
        <div v-else class="space-x-6">
          <Link :href="route('register')" class="nav-link"
            :class="{ 'bg-slate-700': $page.component === 'Auth/Register' }">Register</Link>
          <Link :href="route('login')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Auth/Login' }">
          Login</Link>
        </div>
      </nav>
    </header>
    <main class="max-w-screen-lg mx-auto p-4">
      <slot></slot>
    </main>
  </div>
</template>
