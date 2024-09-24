<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const submit = () => {
  form.post(route('register'), {
    onError: () => form.reset('password', 'password_confirmation')
  })
}
</script>

<template>
  <Head title="Register" />
  <h1 class="title">Register a new account</h1>
  <div class="w-2/4 mx-auto">
    <form class="space-y-6" @submit.prevent="submit">
      <div>
        <label>Name</label>
        <input type="text" v-model="form.name"/>
        <p class="error" v-if="form.errors.name">{{ form.errors.name }}</p>
      </div>
      <div>
        <label>Email</label>
        <input type="email" v-model="form.email" />
        <p class="error" v-if="form.errors.email">{{ form.errors.email }}</p>
      </div>
      <div>
        <label>Password</label>
        <input type="password" v-model="form.password" />
        <p class="error" v-if="form.errors.password">{{ form.errors.password }}</p>
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" v-model="form.password_confirmation" />
      </div>
      <div>
        <p class="text-slate-600">Do not have an account? <a href="#" class="text-link">Register</a></p>
      </div>
      <div>
        <button class="primary-btn" type="submit" :disabled="form.processing">Register</button>
      </div>
    </form>
  </div>
</template>
