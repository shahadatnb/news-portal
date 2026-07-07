<template>
  <div class="border border-[#B08D57] p-5">
    <h2 class="font-display text-xl text-[#0C3B2E] mb-4 pb-3 border-b border-[#B08D57]">
      সর্বাধিক পঠিত
    </h2>
    <ol class="space-y-4">
      <li v-for="(story, index) in stories" :key="story.id" class="flex gap-3">
        <span class="font-mast text-3xl text-[#B08D57] leading-none">{{ index + 1 }}</span>
        <h3 class="font-display text-base leading-snug hover:text-[#0C3B2E] cursor-pointer">
          <router-link :to="`/post/${story.id}`">
            {{ story.title }}
          </router-link>
        </h3>
      </li>
    </ol>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
  stories: {
    type: Array,
    default: () => [
      { id: 1, title: 'ঢাকা-চট্টগ্রাম মহাসড়কে যান চলাচল স্বাভাবিক' },
      { id: 2, title: 'এইচএসসি ফল প্রকাশ আগামী সপ্তাহে' },
      { id: 3, title: 'ডেঙ্গু প্রতিরোধে ঢাকা উত্তরের বিশেষ অভিযান' },
      { id: 4, title: 'নতুন সিনেমা মুক্তি পেল ঈদের ছুটিতে' }
    ]
  }
})
</script>