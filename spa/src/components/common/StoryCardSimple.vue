<template>
  <article class="flex gap-4 items-start">
    <router-link :to="`/post/${story.id}`" class="shrink-0">
      <img 
        :src="story.image || 'https://images.unsplash.com/photo-1591696205602-2f950c417cb9?w=200&h=140&fit=crop'" 
        :alt="story.title" 
        class="w-28 h-20 object-cover"
        @error="handleImageError"
      />
    </router-link>
    <div>
      <h3 class="font-display text-lg leading-snug hover:text-[#0C3B2E] cursor-pointer">
        <router-link :to="`/post/${story.id}`">
          {{ story.title }}
        </router-link>
      </h3>
      <p class="font-utility text-xs text-[#7a6a4f] mt-1">{{ story.time || '৫ ঘণ্টা আগে' }}</p>
    </div>
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

const defaultImage = 'https://images.unsplash.com/photo-1591696205602-2f950c417cb9?w=200&h=140&fit=crop'

const handleImageError = (event) => {
  event.target.src = defaultImage
}
</script>