<template>
  <div class="login">
    <h2>ورود</h2>
    <form @submit.prevent="login">
      <input v-model="form.email" type="email" placeholder="ایمیل" required />
      <input v-model="form.password" type="password" placeholder="رمز عبور" required />
      <button type="submit">ورود</button>
    </form>
    <router-link to="/register">ثبت‌نام</router-link>
    <p v-if="error" style="color:red;">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  email: '',
  password: ''
})

const error = ref('')

const login = async () => {
  try {
    const response = await axios.post('/api/user/login', form.value)
    localStorage.setItem('token', response.data.token)
    axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
    router.push('/dashboard')
  } catch (err) {
    error.value = err.response?.data?.message || 'خطا در ورود'
  }
}
</script>
