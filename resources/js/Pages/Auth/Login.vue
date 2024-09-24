<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
  email: null,
  password: null,
  remember: null,
})

const submit = () => {
  form.post(route('login'), {
    onError: () => form.reset('password', 'remember')
  })
}
</script>

<template>

  <Head title="Login" />
  <h1 class="title">Login to yout account</h1>
  <div class="w-2/4 mx-auto">
    <form class="space-y-6" @submit.prevent="submit">
      <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
      <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <input id="remember" type="checkbox" v-model="form.remember">
          <label for="remember">Remember me</label>
        </div>
        <p class="text-slate-600">Need an account?
          <Link :href="route('register')" class="text-link">Register</Link>
        </p>
      </div>
      <div>
        <button class="primary-btn" type="submit" :disabled="form.processing">Login</button>
      </div>
    </form>
  </div>
</template>
