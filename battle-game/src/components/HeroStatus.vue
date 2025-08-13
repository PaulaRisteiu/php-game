<template>
  <div v-if="loading">Loading hero...</div>
  <div v-else-if="hero">
    <h2>Hero: {{ hero.name }}</h2>
    <p>Health: {{ hero.health }}</p>
    <p>Strength: {{ hero.strength }}</p>
    <p>Defence: {{ hero.defence }}</p>
    <p>Speed: {{ hero.speed }}</p>
    <p>Luck: {{ hero.luck }}</p>
  </div>
  <div v-else>
    <p>No hero data found.</p>
  </div>
</template>

<script setup>
defineProps({
  hero: Object,
  loading: Boolean
})
</script>


<style scoped>
.hero-status {
  border: 1px solid #f44336;
  padding: 1rem;
  margin-bottom: 1rem;
}
</style>
