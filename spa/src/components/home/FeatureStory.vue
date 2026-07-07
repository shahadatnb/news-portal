<template>
  <div v-if="loading" class="animate-pulse">
    <div class="w-full h-72 sm:h-96 bg-gray-300 rounded"></div>
    <div class="mt-4 h-4 bg-gray-300 w-24 rounded"></div>
    <div class="mt-2 h-8 bg-gray-300 w-3/4 rounded"></div>
    <div class="mt-3 h-4 bg-gray-300 w-full rounded"></div>
    <div class="mt-3 h-4 bg-gray-300 w-2/3 rounded"></div>
  </div>
  
  <article v-else class="feature-story">
    <router-link :to="`/post/${story.id || '1'}`">
      <img 
        :src="story.image || defaultImage" 
        :alt="story.title || 'সংসদ ভবন'" 
        class="w-full h-72 sm:h-96 object-cover"
        @error="handleImageError"
      />
    </router-link>
    <span class="inline-block mt-4 text-xs font-utility font-semibold text-[#C8102E] uppercase tracking-wider">
      {{ story.category || 'রাজনীতি' }}
    </span>
    <h2 class="font-display text-3xl sm:text-4xl leading-snug mt-2 text-[#1A1A1A] hover:text-[#0C3B2E] cursor-pointer">
      <router-link :to="`/post/${story.id || '1'}`">
        {{ story.title || 'নতুন অর্থবর্ষের বাজেট নিয়ে সংসদে দিনভর আলোচনা, বিরোধী দলের ভিন্নমত' }}
      </router-link>
    </h2>
    <p class="mt-3 text-[#4a4a4a] leading-relaxed line-clamp-3">
      {{ story.excerpt || 'চলতি অর্থবছরের বাজেট অধিবেশনে অংশ নিয়ে অর্থমন্ত্রী উন্নয়ন খাতে বরাদ্দ বৃদ্ধির ঘোষণা দিয়েছেন। তবে বিরোধী দলের সদস্যরা মূল্যস্ফীতি নিয়ন্ত্রণে সুনির্দিষ্ট পদক্ষেপের অভাব নিয়ে প্রশ্ন তুলেছেন।' }}
    </p>
    <div class="mt-3 font-utility text-xs text-[#7a6a4f] flex items-center gap-3">
      <span>{{ story.author || 'নিজস্ব প্রতিবেদক' }}</span>
      <span>•</span>
      <span>{{ story.time || '৩০ মিনিট আগে' }}</span>
      <span v-if="story.comments" class="flex items-center gap-1">
        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
        {{ story.comments }}
      </span>
    </div>
  </article>
</template>

<script setup>
import { defineProps, ref } from 'vue'

const props = defineProps({
  story: {
    type: Object,
    default: () => ({})
  },
  loading: {
    type: Boolean,
    default: false
  }
})

const defaultImage = 'https://images.unsplash.com/photo-1541823709867-1b206113eafd?w=1200&h=650&fit=crop'

const handleImageError = (event) => {
  event.target.src = defaultImage
}
</script>

<style scoped>
.feature-story {
  transition: all 0.3s ease;
}

.feature-story:hover h2 {
  color: #0C3B2E;
}

.feature-story img {
  transition: transform 0.3s ease;
}

.feature-story:hover img {
  transform: scale(1.02);
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>