<template>
  <div class="register">
    <h2>ثبت‌نام</h2>
    <form @submit.prevent="register">
      <input v-model="form.name" type="text" placeholder="نام کامل" required />
      <input v-model="form.email" type="email" placeholder="ایمیل" required />
      <input v-model="form.password" type="password" placeholder="رمز عبور" required />
      <input v-model="form.password_confirmation" type="password" placeholder="تکرار رمز عبور" required />
      <button type="submit">ثبت‌نام</button>
    </form>
    <p v-if="error" style="color:red;">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

const error = ref('')

const register = async () => {
  try {
    const response = await axios.post('/api/user/register', form.value)
    localStorage.setItem('token', response.data.token)
    axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
    router.push('/dashboard')
  } catch (err) {
    error.value = err.response?.data?.message || 'خطا در ثبت‌نام'
  }
}
</script>
