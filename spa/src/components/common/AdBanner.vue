<template>
  <div 
    class="p-5 text-center"
    :class="{
      'border-2 border-[#C8102E]': color === 'red',
      'border border-[#B08D57]': color === 'gold',
      'bg-[#0C3B2E] text-white': color === 'dark'
    }"
  >
    <p class="font-utility text-xs uppercase tracking-wider" :class="{
      'text-[#C8102E] font-semibold': color === 'red',
      'text-[#7a6a4f]': color === 'gold',
      'text-white/50': color === 'dark'
    }">
      বিজ্ঞাপন
    </p>
    <div 
      class="flex items-center justify-center font-utility text-sm text-[#7a6a4f] mt-2"
      :class="{
        'h-48': size === '300x400',
        'h-64': size === '300x600',
        'h-32': size === '728x90'
      }"
    >
      {{ size }}
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'

const props = defineProps({
  size: {
    type: String,
    default: '300x400',
    validator: (value) => ['300x400', '300x600', '728x90'].includes(value)
  },
  color: {
    type: String,
    default: 'red',
    validator: (value) => ['red', 'gold', 'dark'].includes(value)
  }
})
</script>