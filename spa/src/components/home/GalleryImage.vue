<template>
  <router-link :to="`/post/${image.id}`" class="relative block group overflow-hidden">
    <img 
      :src="image.src || 'https://images.unsplash.com/photo-1583225214464-9296029427aa?w=400&h=300&fit=crop'" 
      :alt="image.alt || 'গ্যালারি ইমেজ'" 
      class="w-full h-32 sm:h-40 object-cover group-hover:scale-105 transition-transform duration-300"
      @error="handleImageError"
    />
    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300"></div>
  </router-link>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
  image: {
    type: Object,
    required: true
  }
})

const defaultImage = 'https://images.unsplash.com/photo-1583225214464-9296029427aa?w=400&h=300&fit=crop'

const handleImageError = (event) => {
  event.target.src = defaultImage
}
</script>