<template>
  <article class="group">
    <router-link :to="`/post/${story.id}`">
      <img 
        :src="story.image || 'https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=600&h=380&fit=crop'" 
        :alt="story.title" 
        class="w-full h-48 object-cover"
        @error="handleImageError"
      />
    </router-link>
    <h3 class="font-display text-lg mt-3 leading-snug group-hover:text-[#0C3B2E] cursor-pointer">
      <router-link :to="`/post/${story.id}`">
        {{ story.title }}
      </router-link>
    </h3>
    <p v-if="story.excerpt" class="text-sm text-[#4a4a4a] mt-1 leading-relaxed line-clamp-2">
      {{ story.excerpt }}
    </p>
    <p v-if="story.time" class="font-utility text-xs text-[#7a6a4f] mt-2">
      {{ story.time }}
    </p>
  </article>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
  story: {
    type: Object,
    required: true
  }
})

const defaultImage = 'https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=600&h=380&fit=crop'

const handleImageError = (event) => {
  event.target.src = defaultImage
}
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>