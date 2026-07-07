<template>
  <div v-if="isOpen" class="fixed inset-0 bg-black/50 z-40 md:hidden" @click="close"></div>
  
  <div 
    class="fixed top-0 right-0 h-full w-80 max-w-[85%] bg-[#FAF6EE] z-50 shadow-2xl transition-transform duration-300 ease-out md:hidden overflow-y-auto"
    :class="{ 'translate-x-0': isOpen, 'translate-x-full': !isOpen }"
  >
    <div class="flex items-center justify-between px-4 py-4 bg-[#0C3B2E]">
      <span class="font-mast text-2xl text-[#FAF6EE]">দৈনিক সময়</span>
      <button @click="close" type="button" aria-label="মেনু বন্ধ করুন" class="text-[#FAF6EE] w-9 h-9 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <ul class="font-utility text-sm text-[#1A1A1A]">
      <li v-for="item in menuItems" :key="item.label" class="border-b hairline">
        <template v-if="!item.children">
          <router-link :to="item.path" class="block px-4 py-3" @click="close">
            {{ item.label }}
          </router-link>
        </template>
        <template v-else>
          <button 
            @click="toggleSubmenu(item.label)" 
            type="button" 
            class="submenu-toggle w-full flex items-center justify-between px-4 py-3 text-left"
            :aria-expanded="isSubmenuOpen(item.label)"
          >
            <span>{{ item.label }}</span>
            <svg 
              class="w-4 h-4 transition-transform duration-200" 
              :class="{ 'rotate-180': isSubmenuOpen(item.label) }"
              fill="none" 
              viewBox="0 0 24 24" 
              stroke="currentColor" 
              stroke-width="2"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <ul v-show="isSubmenuOpen(item.label)" class="bg-black/5">
            <li v-for="child in item.children" :key="child.label">
              <router-link :to="child.path" class="block px-6 py-2.5 text-[#4a4a4a]" @click="close">
                {{ child.label }}
              </router-link>
            </li>
          </ul>
        </template>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useMobileMenuStore } from '@/store/modules/mobileMenu'

const mobileMenuStore = useMobileMenuStore()
const isOpen = computed(() => mobileMenuStore.isOpen)

const close = () => mobileMenuStore.close()
const toggle = () => mobileMenuStore.toggle()

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
  { label: 'লাইফস্টাইল', path: '/category/lifestyle' },
  { label: 'আমাদের সম্পর্কে', path: '/about' },
  { label: 'যোগাযোগ', path: '/contact' }
]

// Submenu state
const openSubmenus = new Set()

const toggleSubmenu = (label) => {
  if (openSubmenus.has(label)) {
    openSubmenus.delete(label)
  } else {
    openSubmenus.add(label)
  }
}

const isSubmenuOpen = (label) => openSubmenus.has(label)
</script>