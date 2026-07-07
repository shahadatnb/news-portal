<template>
  <div class="bg-[#C8102E] text-white overflow-hidden mb-8">
    <div class="max-w-7xl mx-auto px-0 sm:px-6 flex items-center h-9">
      <span class="font-utility text-xs font-semibold px-3 py-1 bg-[#8f0c21] shrink-0 h-full flex items-center">
        সর্বশেষ
      </span>
      <div class="relative flex-1 h-full overflow-hidden">
        <div class="ticker-track absolute whitespace-nowrap text-sm py-1.5 px-4">
          <span v-for="(item, index) in tickerItems" :key="index">
            {{ item }}
            <span v-if="index < tickerItems.length - 1" class="mx-4">•</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import api from '@/services/api'

const tickerItems = ref([])
const loading = ref(true)

const fetchTickerItems = async () => {
  try {
    loading.value = true
    const response = await api.get('/breaking-news')
    //tickerItems.value = response.data.map(item => item.title)
  } catch (error) {
    console.error('Error fetching ticker items:', error)
    // Fallback data
    tickerItems.value = [
      'সার্ভার থেকে ডাটা লোড করতে সমস্যা হয়েছে',
      'পুনরায় চেষ্টা করুন'
    ]
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchTickerItems()
})
</script>

<style scoped>
.ticker-track {
  animation: ticker 28s linear infinite;
  display: inline-block;
}

@keyframes ticker {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-100%);
  }
}

@media (prefers-reduced-motion: reduce) {
  .ticker-track {
    animation: none;
  }
}

/* Pause animation on hover */
.ticker-track:hover {
  animation-play-state: paused;
}
</style>