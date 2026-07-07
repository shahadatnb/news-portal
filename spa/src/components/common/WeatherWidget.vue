<template>
  <div class="bg-[#0C3B2E] text-[#FAF6EE] p-5">
    <h2 class="font-display text-xl mb-3">ঢাকার আবহাওয়া</h2>
    <div class="flex items-end justify-between">
      <span class="font-mast text-5xl">{{ temperature }}°</span>
      <span class="font-utility text-sm text-right opacity-90">
        {{ condition }}<br>{{ description }}
      </span>
    </div>
    <p class="font-utility text-xs mt-3 opacity-75">
      আর্দ্রতা {{ humidity }}% • বৃষ্টির সম্ভাবনা {{ rainChance }}%
    </p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '@/services/api'

const temperature = ref(32)
const condition = ref('বৃষ্টিসহ')
const description = ref('মেঘলা আকাশ')
const humidity = ref(84)
const rainChance = ref(70)

// Optional: Fetch real weather data
const fetchWeather = async () => {
  try {
    const response = await api.get('/weather/dhaka')
    temperature.value = response.data.temp
    condition.value = response.data.condition
    description.value = response.data.description
    humidity.value = response.data.humidity
    rainChance.value = response.data.rain_chance
  } catch (error) {
    console.error('Error fetching weather:', error)
    // Use default values
  }
}

onMounted(() => {
  fetchWeather()
})
</script>