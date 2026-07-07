<template>
  <div>
    <div class="flex items-center gap-3 mb-5">
      <h2 class="font-display text-2xl text-[#0C3B2E]">{{ title }}</h2>
      <span class="flex-1 h-px border-t border-[#B08D57]"></span>
      <router-link :to="category" class="font-utility text-xs text-[#C8102E] hover:underline">
        সব খবর
      </router-link>
    </div>
    <div class="grid sm:grid-cols-2 gap-6">
      <StoryCard 
        v-for="story in stories" 
        :key="story.id"
        :story="story"
      />
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'
import StoryCard from '@/components/common/StoryCard.vue'

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  category: {
    type: String,
    required: true
  },
  stories: {
    type: Array,
    default: () => []
  }
})
</script>