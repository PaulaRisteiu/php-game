<template>
  <div class="battle-field">
    <h1>Battle Simulation</h1>

    <button @click="$emit('start-battle')" :disabled="loading">
    <span v-if="loading">⏳ Se luptă...</span>
    <span v-else>🔄 Start Battle</span>
  </button>

    <div v-if="loading" class="loading">Simulating...</div>

    <div v-if="battle" class="battle-results">
      <div class="status">
        <hero-status :hero="battle.hero" />
        <monster-status :monster="battle.monster" />
      </div>

      <battle-log :logs="battle.rounds" />

      <div v-if="battle.winner" class="winner">
        🏆 Câștigător: {{ battle.winner }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

import HeroStatus from './HeroStatus.vue';
import MonsterStatus from './MonsterStatus.vue';
import BattleLog from './BattleLog.vue';

const props = defineProps({
  battle: Object,
  loading: Boolean
});

const emit = defineEmits(['start-battle']);
</script>

<style scoped>
.battle-field {
  text-align: center;
  margin-top: 2rem;
}

.status {
  display: flex;
  justify-content: center;
  gap: 3rem;
  margin-bottom: 1rem;
}

.winner {
  margin-top: 1.5rem;
  font-size: 1.5rem;
  font-weight: bold;
  color: green;
}

.loading {
  font-style: italic;
  color: #555;
}
</style>
