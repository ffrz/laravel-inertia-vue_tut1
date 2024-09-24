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
          <img
            :src="$page.props.auth.user.avatar ? 'storage/' + $page.props.auth.user.avatar : 'storage/avatars/default.png'"
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
      <p v-if="$page.props.flash.info" class="p-4 bg-green-300 rounded-md border border-green-500">{{
        $page.props.flash.info }}</p>
      <p v-if="$page.props.flash.warning" class="p-4 bg-yellow-300 rounded-md border border-yellow-500">{{
        $page.props.flash.warning }}</p>
      <p v-if="$page.props.flash.error" class="p-4 bg-red-300 rounded-md border border-red-500">{{
        $page.props.flash.error }}</p>
      <div class="mt-5">
        <slot></slot>
      </div>
    </main>
  </div>
</template>
