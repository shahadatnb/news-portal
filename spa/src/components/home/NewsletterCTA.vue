<template>
  <section class="mt-14 bg-[#0C3B2E] text-[#FAF6EE] px-6 sm:px-10 py-10 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div class="text-center sm:text-left">
      <h2 class="font-display text-2xl sm:text-3xl">প্রতিদিনের গুরুত্বপূর্ণ খবর পান ইমেইলে</h2>
      <p class="font-utility text-sm opacity-80 mt-2">প্রতিদিন সকালে বাছাই করা সংবাদ সরাসরি আপনার ইনবক্সে</p>
    </div>
    <form class="flex w-full sm:w-auto shrink-0" @submit.prevent="handleSubscribe">
      <input 
        v-model="email"
        type="email" 
        placeholder="ইমেইল ঠিকানা" 
        class="flex-1 sm:w-64 px-4 py-2.5 text-sm text-[#1A1A1A] focus:outline-none focus:ring-2 focus:ring-[#C8102E]"
        required
      />
      <button 
        type="submit" 
        class="bg-[#C8102E] px-5 py-2.5 text-sm font-utility font-semibold hover:bg-[#a80d26] transition-colors shrink-0"
        :disabled="loading"
      >
        {{ loading ? '...' : 'সাবস্ক্রাইব' }}
      </button>
    </form>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import api from '@/services/api'

const email = ref('')
const loading = ref(false)

const handleSubscribe = async () => {
  if (!email.value) return
  
  loading.value = true
  try {
    await api.post('/subscribe', { email: email.value })
    alert('সাবস্ক্রিপশন সফল হয়েছে!')
    email.value = ''
  } catch (error) {
    alert('সাবস্ক্রিপশন করতে সমস্যা হয়েছে। আবার চেষ্টা করুন।')
    console.error('Subscription error:', error)
  } finally {
    loading.value = false
  }
}
</script>