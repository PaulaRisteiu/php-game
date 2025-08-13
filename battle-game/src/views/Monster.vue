<template>
  <div class="monster-page">
    <h1>Monster Page</h1>
    <MonsterStatus :monster="monster" :loading="loading" />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import MonsterStatus from '@/components/MonsterStatus.vue'

const monster = ref(null)
const loading = ref(true)

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8081/api/monster')
    console.log('API full response:', response.data) // vezi tot obiectul returnat de API
    monster.value = response.data.data
  } catch (error) {
    console.error('API error:', error)
  } finally {
    loading.value = false
  }
})
</script>

<style scoped>
.monster-page {
  text-align: center;
  margin-top: 2rem;
}
</style>
