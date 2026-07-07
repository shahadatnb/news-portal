<template>
  <article class="py-4" :class="{ 'pb-4': !isLast, 'pt-4': !isFirst }">
    <span class="text-xs font-utility font-semibold text-[#0C3B2E] uppercase tracking-wider">
      {{ story.category || 'অর্থনীতি' }}
    </span>
    <h3 class="font-display text-xl mt-1 leading-snug hover:text-[#0C3B2E] cursor-pointer">
      <router-link :to="`/post/${story.id || '1'}`">
        {{ story.title || 'রেমিট্যান্স প্রবাহে টানা পঞ্চম মাসে প্রবৃদ্ধি' }}
      </router-link>
    </h3>
    <p class="font-utility text-xs text-[#7a6a4f] mt-1">
      {{ story.time || '১ ঘণ্টা আগে' }}
    </p>
  </article>
</template>

<script setup>
import { defineProps, computed } from 'vue'

const props = defineProps({
  story: {
    type: Object,
    default: () => ({})
  },
  isFirst: {
    type: Boolean,
    default: false
  },
  isLast: {
    type: Boolean,
    default: false
  }
})
</script>