<template>
  <!-- Breaking bar -->
  <div class="bg-indigo-600 text-white text-sm">
    <div class="max-w-8xl mx-auto px-4 py-2">
      <div class="flex items-center gap-3">
        <span class="font-semibold">সর্বশেষ সংবাদ:</span>
        <div class="overflow-hidden whitespace-nowrap">
          <div class="inline-block animate-marquee">
            <span v-for="(h,i) in headlines" :key="i" class="mr-6">🔥 {{ h.title }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="min-h-screen bg-gray-50 text-gray-800">
    <!-- Top nav -->
    <header class="bg-white shadow">
      <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
          <div class="flex items-center gap-4">
            <Link href="/" class="text-2xl font-extrabold text-indigo-600"><img src="/images/logo.svg" class="h-8" alt="DailySonardesh" /></Link>            
          </div>
          <div class="flex items-center gap-4">
            
          </div>
        </div>
        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-6 font-medium">
          <Link href="/" class="hover:text-red-500">Home</Link>
          <Link href="/news" class="hover:text-red-500">All News</Link>

          <!-- Dropdown -->
          <div class="relative group">
            <button class="hover:text-red-500 flex items-center gap-1">
              Categories ▾
            </button>
            <div
              class="absolute left-0 mt-2 hidden group-hover:block bg-white shadow-lg rounded-md w-40"
            >
              <Link
                v-for="c in categories"
                :key="c.id"
                :href="`/category/${c.slug}`"
                class="block px-3 py-2 hover:bg-gray-100"
              >
                {{ c.name }}
              </Link>
            </div>
          </div>

          <Link href="/contact" class="hover:text-red-500">Contact</Link>
        </nav>

        <!-- Mobile Menu Button -->
        <button
          @click="isOpen = !isOpen"
          class="md:hidden text-2xl focus:outline-none"
        >
          <i class="fa-solid" :class="isOpen ? 'fa-xmark' : 'fa-bars'"></i>
        </button>
      </div>

      <!-- Mobile Slide Menu -->
      <transition name="slide">
        <div
          v-if="isOpen"
          class="md:hidden bg-white shadow-inner border-t"
        >
          <nav class="px-4 py-3 space-y-2">

            <Link href="/" class="block py-2 border-b">Home</Link>
            <Link href="/news" class="block py-2 border-b">All News</Link>

            <!-- Mobile Dropdown -->
            <details class="border-b">
              <summary class="py-2 cursor-pointer">Categories</summary>
              <div class="pl-4 pb-2">
                <Link
                  v-for="c in categories"
                  :key="c.id"
                  :href="`/category/${c.slug}`"
                  class="block py-1"
                >
                  {{ c.name }}
                </Link>
              </div>
            </details>

            <Link href="/contact" class="block py-2">Contact</Link>
          </nav>
        </div>
      </transition>    
    </header>
      </div>

    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <slot />
    </main>

    <footer class="bg-white border-t mt-12">
      <div class="max-w-8xl mx-auto px-4 py-8 text-sm text-gray-600">
        <div class="flex flex-col md:flex-row justify-between">
          <div>© {{ new Date().getFullYear() }} DailySonardesh — সর্বস্বত্ব সংরক্ষিত</div>
          <div class="mt-4 md:mt-0"> <a href="https://asiancoder.com" target="_blank" class="hover:underline">AsianCoder</a></div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
defineProps({
  headlines: { type: Array, default: () => [] }
})
const q = ref('')
</script>

<style scoped>
@keyframes marquee {
  0% { transform: translateX(0%); }
  100% { transform: translateX(-50%); }
}
.animate-marquee { display: inline-block; animation: marquee 18s linear infinite; }
</style>
