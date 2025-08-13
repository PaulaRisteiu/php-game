<template>
  <div v-if="loading">Loading monster...</div>
  <div v-else-if="monster">
    <h2>Monster: {{ monster.name }}</h2>
    <p>Health: {{ monster.health }}</p>
    <p>Strength: {{ monster.strength }}</p>
    <p>Defence: {{ monster.defence }}</p>
    <p>Speed: {{ monster.speed }}</p>
    <p>Luck: {{ monster.luck }}</p>
  </div>
  <div v-else>
    <p>No monster data found.</p>
  </div>
</template>

<script setup>
defineProps({
  monster: Object,
  loading: Boolean
})
</script>

<style scoped>
.monster-status {
  border: 1px solid #f44336;
  padding: 1rem;
  margin-bottom: 1rem;
}
</style>
