<script setup>
import { reactive } from 'vue';

const form = reactive({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const submit = () => {
  console.log(form)
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
      </div>
      <div>
        <label>Email</label>
        <input type="email" v-model="form.email" />
      </div>
      <div>
        <label>Password</label>
        <input type="password" v-model="form.password" />
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" v-model="form.password_confirmation" />
      </div>
      <div>
        <p class="text-slate-600">Do not have an account? <a href="#" class="text-link">Register</a></p>
      </div>
      <div>
        <button class="primary-btn" type="submit">Register</button>
      </div>
    </form>
  </div>
</template>
