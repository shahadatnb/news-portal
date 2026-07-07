<template>
  <article class="flex gap-4 items-start">
    <img 
      :src="opinion.avatar || 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=160&h=160&fit=crop'" 
      :alt="opinion.author" 
      class="w-16 h-16 rounded-full object-cover shrink-0"
      @error="handleImageError"
    />
    <div>
      <h3 class="font-display text-xl leading-snug hover:text-[#0C3B2E] cursor-pointer">
        <router-link :to="`/post/${opinion.id}`">
          {{ opinion.title }}
        </router-link>
      </h3>
      <p class="text-sm text-[#4a4a4a] mt-1 leading-relaxed line-clamp-2">
        {{ opinion.excerpt }}
      </p>
      <p class="font-utility text-xs text-[#7a6a4f] mt-2">
        {{ opinion.author }} • {{ opinion.role || 'মতামত সম্পাদক' }}
      </p>
    </div>
  </article>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
  opinion: {
    type: Object,
    required: true
  }
})

const defaultAvatar = 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=160&h=160&fit=crop'

const handleImageError = (event) => {
  event.target.src = defaultAvatar
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