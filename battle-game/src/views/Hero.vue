<template>
  <div class="hero-page">
    <h1>Hero Page</h1>
    <HeroStatus :hero="hero" :loading="loading" />
    <p>This is where you can view and manage your hero.</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import HeroStatus from '@/components/HeroStatus.vue'

const hero = ref(null)
const loading = ref(true)

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8081/api/hero')
    console.log('API full response:', response.data) // vezi tot obiectul returnat de API
    hero.value = response.data.data
  } catch (error) {
    console.error('API error:', error)
  } finally {
    loading.value = false
  }
})
</script>

<style scoped>
.hero-page {
  text-align: center;
  margin-top: 2rem;
}
</style>
