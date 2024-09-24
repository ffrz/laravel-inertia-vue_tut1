<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';

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
      <TextInput label="Name" type="text" v-model="form.name" :error="form.errors.name" />
      <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
      <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />
      <TextInput label="Password Confirmation" type="password" v-model="form.password_confirmation"
        :error="form.errors.password_confirmation" />
      <div>
        <p class="text-slate-600">Do not have an account? <a href="#" class="text-link">Register</a></p>
      </div>
      <div>
        <button class="primary-btn" type="submit" :disabled="form.processing">Register</button>
      </div>
    </form>
  </div>
</template>
