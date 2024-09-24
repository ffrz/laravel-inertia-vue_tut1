<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
  avatar: null,
  preview: null,
})

const submit = () => {
  form.post(route('register'), {
    onError: () => form.reset('password', 'password_confirmation')
  })
}

const change = (e) => {
  form.avatar = e.target.files[0];
  form.preview = URL.createObjectURL(e.target.files[0]);
}
</script>

<template>

  <Head title="Register" />
  <h1 class="title">Register a new account</h1>
  <div class="w-2/4 mx-auto">
    <form class="space-y-6" @submit.prevent="submit">
      <div class="grid place-items-center">
        <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
          <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
            <span class="bg-white/70 pb-2 text-center">Avatar</span>
          </label>
          <input type="file" id="avatar" @input="change" hidden>
          <img class="object-cover w-28 h-28" :src="form.preview ?? 'storage/avatars/default.png'">
        </div>
      </div>
      <TextInput label="Name" type="text" v-model="form.name" :error="form.errors.name" />
      <TextInput label="Email" type="email" v-model="form.email" :error="form.errors.email" />
      <TextInput label="Password" type="password" v-model="form.password" :error="form.errors.password" />
      <TextInput label="Password Confirmation" type="password" v-model="form.password_confirmation"
        :error="form.errors.password_confirmation" />
      <div>
        <p class="text-slate-600">Already have an account?
          <Link :href="route('login')" class="text-link">Login</Link>
        </p>
      </div>
      <div>
        <button class="primary-btn" type="submit" :disabled="form.processing">Register</button>
      </div>
    </form>
  </div>
</template>
