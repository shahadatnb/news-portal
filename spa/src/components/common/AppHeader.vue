<template>
  <div class="bg-[#0C3B2E] text-[#FAF6EE]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-1.5 flex flex-wrap items-center justify-between gap-2 font-utility text-[11px] sm:text-xs">
      <div class="flex flex-wrap items-center gap-x-3 gap-y-1 opacity-90">
        <span>{{ banglaDate }}</span>
        <span class="opacity-40">•</span>
        <span>{{ hijriDate }}</span>
        <span class="opacity-40">•</span>
        <span>{{ englishDate }}</span>
      </div>
      <div class="flex items-center gap-4">
        <a href="#" class="hover:underline">ই-পেপার</a>
        <a href="#" class="hover:underline">আর্কাইভ</a>
        <a href="#" class="border border-[#B08D57] rounded-sm px-2 py-0.5 hover:bg-[#B08D57] hover:text-[#0C3B2E] transition-colors">সাবস্ক্রাইব</a>
      </div>
    </div>
  </div>

  <header class="bg-[#FAF6EE] border-b-2 hairline">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5 flex items-center justify-between gap-6">
      <router-link to="/" class="flex flex-col shrink-0">
        <span class="font-mast text-3xl sm:text-4xl md:text-5xl tracking-tight text-[#0C3B2E] leading-none">দৈনিক সময়</span>
        <span class="font-utility text-[10px] sm:text-xs mt-1 text-[#7a6a4f]">সত্য প্রকাশে অবিচল — প্রতিষ্ঠিত ১৯৯৮</span>
      </router-link>

      <div class="hidden md:flex flex-1 items-center justify-end">
        <div class="flex items-center justify-center border-2 border-dashed border-[#B08D57] h-20 w-full max-w-md">
          <p class="font-utility text-xs text-[#7a6a4f] text-center leading-relaxed">বিজ্ঞাপনের স্থান<br>৭২৮ x ৯০</p>
        </div>
      </div>

      <button 
        @click="toggleMobileMenu" 
        type="button" 
        aria-label="মেনু খুলুন" 
        class="md:hidden w-11 h-11 flex items-center justify-center border hairline shrink-0"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0C3B2E]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/>
        </svg>
      </button>
    </div>
  </header>
</template>

<script setup>
import { computed } from 'vue'
import { useMobileMenuStore } from '@/store/modules/mobileMenu'

const mobileMenuStore = useMobileMenuStore()

const toggleMobileMenu = () => {
  mobileMenuStore.toggle()
}

// Date calculations
const now = new Date()
const banglaDate = computed(() => '২২ আষাঢ়, ১৪৩৩ বঙ্গাব্দ')
const hijriDate = computed(() => '২১ মহররম, ১৪৪৮ হিজরি')
const englishDate = computed(() => {
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }
  return now.toLocaleDateString('bn-BD', options)
})
</script>