<template>
  <div class="battle-field">
    <h1>Battle Field</h1>
    <BattleField
      :battle="battle"
      :loading="loading"
      @start-battle="startBattle"
    />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import BattleField from '@/components/BattleField.vue';

const battle = ref(null);
const loading = ref(false);

// Exemplu de ID-uri; poți înlocui cu selecția utilizatorului
const selectedHeroId = 1;
const selectedMonsterId = 1;

async function startBattle() {
  loading.value = true;
  try {
    // Trimite POST cu JSON compatibil PHP
    const payload = {
      hero_id: selectedHeroId,
      monster_id: selectedMonsterId
    };

    const response = await axios.post(
      'http://localhost:8081/api/battle/fight',
      payload,
      {
        headers: {
          'Content-Type': 'application/json'
        }
      }
    );

    console.log('API full response:', response.data);
    // Preluăm obiectul returnat de API
    battle.value = response.data.data || response.data;

  } catch (error) {
    console.error('API error:', error.response?.data || error.message);
  } finally {
    loading.value = false;
  }
}

onMounted(() => {
  startBattle();
});
</script>

<style scoped>
.battle-field {
  text-align: center;
  margin-top: 2rem;
}

button {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  cursor: pointer;
}

button:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

.result {
  margin-top: 2rem;
  display: flex;
  justify-content: center;
  gap: 2rem;
}
</style>


<!--    <div v-if="battleResult">-->
<!--      <p><strong>Erou:</strong> {{ battleResult.hero.name }} ({{ battleResult.hero.health }} HP)</p>-->
<!--      <p><strong>Monstru:</strong> {{ battleResult.monster.name }} ({{ battleResult.monster.health }} HP)</p>-->
<!--      <p><strong>🏆 Câștigător:</strong> {{ battleResult.winner }}</p>-->

<!--      <h2>📜 Desfășurarea luptei:</h2>-->
<!--      <div v-for="round in battleResult.rounds" :key="round.round" class="round-log">-->
<!--        <h3>Runda {{ round.round }}</h3>-->
<!--        <ul>-->
<!--          <li v-for="(action, index) in round.actions" :key="index">{{ action }}</li>-->
<!--        </ul>-->
<!--      </div>-->
<!--    </div>-->

<!--    <button @click="startBattle" :disabled="loading">-->
<!--      <span v-if="loading">⏳ Se luptă...</span>-->
<!--      <span v-else>🔄 Reîncepe lupta</span>-->
<!--    </button>-->
<!--  </div>-->
<!--</template>-->

<!--<script setup>-->
<!--import { ref } from 'vue'-->
<!--import axios from 'axios'-->

<!--const props = defineProps({-->
<!--  initialResult: Object-->
<!--})-->

<!--const battleResult = ref(props.initialResult)-->
<!--const loading = ref(false)-->

<!--function startBattle() {-->
<!--  loading.value = true-->
<!--  axios.get('/battle/fight')-->
<!--    .then(response => {-->
<!--      battleResult.value = response.data-->
<!--    })-->
<!--    .finally(() => {-->
<!--      loading.value = false-->
<!--    })-->
<!--}-->
<!--</script>-->
