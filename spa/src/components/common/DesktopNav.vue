<template>
  <nav class="hidden md:block bg-[#0C3B2E] sticky top-0 z-30 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 flex items-center justify-between">
      <ul class="flex items-center gap-1 text-[#FAF6EE] text-sm font-medium whitespace-nowrap">
        <li v-for="item in menuItems" :key="item.label" class="relative group">
          <router-link 
            v-if="!item.children"
            :to="item.path" 
            class="block px-4 py-3 hover:bg-white/10 transition-colors"
            :class="{ 'bg-[#C8102E]': $route.path === item.path }"
          >
            {{ item.label }}
          </router-link>
          
          <div v-else class="relative group">
            <router-link 
              :to="item.path" 
              class="flex items-center gap-1 px-4 py-3 hover:bg-white/10 transition-colors"
            >
              {{ item.label }}
              <svg class="w-3 h-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
              </svg>
            </router-link>
            <ul class="absolute left-0 top-full w-52 bg-[#FAF6EE] text-[#1A1A1A] border hairline shadow-lg opacity-0 invisible translate-y-1 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-150 z-40">
              <li v-for="child in item.children" :key="child.label">
                <router-link :to="child.path" class="block px-4 py-2.5 text-sm font-utility hover:bg-[#0C3B2E] hover:text-white transition-colors">
                  {{ child.label }}
                </router-link>
              </li>
            </ul>
          </div>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="hidden lg:flex items-center py-2 ml-2" @submit.prevent="handleSearch">
        <input 
          v-model="searchQuery" 
          type="search" 
          placeholder="খবর খুঁজুন" 
          class="w-40 px-3 py-1.5 text-sm text-[#1A1A1A] focus:outline-none"
        />
        <button type="submit" aria-label="অনুসন্ধান" class="bg-[#C8102E] px-3 py-1.5 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
          </svg>
        </button>
      </form>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const searchQuery = ref('')

const menuItems = [
  { label: 'প্রচ্ছদ', path: '/' },
  { 
    label: 'জাতীয়', 
    path: '/category/national',
    children: [
      { label: 'সংসদ', path: '/category/national/parliament' },
      { label: 'প্রশাসন', path: '/category/national/admin' },
      { label: 'শিক্ষা', path: '/category/national/education' }
    ]
  },
  { 
    label: 'রাজনীতি', 
    path: '/category/politics',
    children: [
      { label: 'দলীয় রাজনীতি', path: '/category/politics/party' },
      { label: 'স্থানীয় সরকার', path: '/category/politics/local' },
      { label: 'নির্বাচন', path: '/category/politics/election' }
    ]
  },
  { label: 'অর্থনীতি', path: '/category/economy' },
  { 
    label: 'খেলাধুলা', 
    path: '/category/sports',
    children: [
      { label: 'ক্রিকেট', path: '/category/sports/cricket' },
      { label: 'ফুটবল', path: '/category/sports/football' },
      { label: 'অন্যান্য খেলা', path: '/category/sports/others' }
    ]
  },
  { 
    label: 'বিনোদন', 
    path: '/category/entertainment',
    children: [
      { label: 'চলচ্চিত্র', path: '/category/entertainment/film' },
      { label: 'সংগীত', path: '/category/entertainment/music' },
      { label: 'টেলিভিশন', path: '/category/entertainment/tv' }
    ]
  },
  { label: 'আন্তর্জাতিক', path: '/category/international' },
  { label: 'মতামত', path: '/category/opinion' },
  { label: 'লাইফস্টাইল', path: '/category/lifestyle' }
]

const handleSearch = () => {
  if (searchQuery.value.trim()) {
    router.push({ path: '/search', query: { q: searchQuery.value } })
    searchQuery.value = ''
  }
}
</script>