<template>
  <div class="flex items-center gap-3 mb-5">
    <h2 class="font-display text-2xl text-[#0C3B2E]">{{ title }}</h2>
    <span class="flex-1 h-px border-t border-[#B08D57]"></span>
    <router-link 
      v-if="path" 
      :to="path" 
      class="font-utility text-xs text-[#C8102E] hover:underline"
    >
      সব খবর
    </router-link>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  path: {
    type: String,
    default: ''
  }
})
</script>