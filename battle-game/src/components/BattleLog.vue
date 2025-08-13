<template>
  <div class="battle-log">
    <h3>📜 Desfășurarea luptei:</h3>
    <div v-for="round in logs" :key="round.round" class="round-log">
      <h4>Runda {{ round.round }}</h4>
      <ul>
        <li v-for="(action, idx) in round.actions" :key="idx">{{ action }}</li>
      </ul>
    </div>
  </div>
</template>

<script setup>
defineProps({
  logs: Array
})
</script>

<style scoped>
.battle-log {
  text-align: left;
  max-width: 600px;
  margin: 1rem auto;
}

.round-log {
  margin-bottom: 1rem;
  padding: 0.5rem;
  border-bottom: 1px solid #ccc;
}
</style>
