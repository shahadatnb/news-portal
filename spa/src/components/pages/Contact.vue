<template>
  <div class="max-w-5xl mx-auto px-4 sm:px-6 py-12">
    <h1 class="font-display text-4xl text-[#0C3B2E] mb-2">যোগাযোগ করুন</h1>
    <p class="font-utility text-sm text-[#7a6a4f] mb-10">সংবাদ, মতামত বা বিজ্ঞাপন সংক্রান্ত যেকোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করুন</p>

    <div class="grid sm:grid-cols-2 gap-10">
      <!-- Contact info -->
      <div class="space-y-6">
        <div class="border-l-2 border-[#B08D57] pl-4">
          <p class="font-utility text-xs uppercase tracking-wider text-[#0C3B2E] font-semibold">কার্যালয়</p>
          <p class="mt-1 text-sm leading-relaxed">১২৩ প্রেস ক্লাব রোড, মতিঝিল, ঢাকা-১০০০</p>
        </div>
        <div class="border-l-2 border-[#B08D57] pl-4">
          <p class="font-utility text-xs uppercase tracking-wider text-[#0C3B2E] font-semibold">সংবাদ কক্ষ</p>
          <p class="mt-1 text-sm">newsroom@doinikshomoy.com</p>
          <p class="text-sm">+৮৮০ ২-৯৫৫১২৩৪</p>
        </div>
        <div class="border-l-2 border-[#B08D57] pl-4">
          <p class="font-utility text-xs uppercase tracking-wider text-[#0C3B2E] font-semibold">বিজ্ঞাপন</p>
          <p class="mt-1 text-sm">ads@doinikshomoy.com</p>
          <p class="text-sm">+৮৮০ ১৭১২-৩৪৫৬৭৮</p>
        </div>
      </div>

      <!-- Contact form -->
      <form class="space-y-4" @submit.prevent="handleSubmit">
        <div>
          <label for="name" class="font-utility text-xs text-[#7a6a4f] block mb-1">পূর্ণ নাম</label>
          <input 
            id="name" 
            v-model="form.name"
            type="text" 
            class="w-full border border-[#B08D57] px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#0C3B2E]"
            placeholder="আপনার নাম লিখুন"
          />
        </div>
        <div>
          <label for="email" class="font-utility text-xs text-[#7a6a4f] block mb-1">ইমেইল ঠিকানা</label>
          <input 
            id="email" 
            v-model="form.email"
            type="email" 
            class="w-full border border-[#B08D57] px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#0C3B2E]"
            placeholder="you@example.com"
          />
        </div>
        <div>
          <label for="subject" class="font-utility text-xs text-[#7a6a4f] block mb-1">বিষয়</label>
          <select 
            id="subject" 
            v-model="form.subject"
            class="w-full border border-[#B08D57] px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#0C3B2E]"
          >
            <option>সংবাদ প্রসঙ্গে</option>
            <option>বিজ্ঞাপন প্রসঙ্গে</option>
            <option>মতামত জমা</option>
            <option>অন্যান্য</option>
          </select>
        </div>
        <div>
          <label for="message" class="font-utility text-xs text-[#7a6a4f] block mb-1">বার্তা</label>
          <textarea 
            id="message" 
            v-model="form.message"
            rows="5" 
            class="w-full border border-[#B08D57] px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-[#0C3B2E]"
            placeholder="আপনার বার্তা লিখুন"
          ></textarea>
        </div>
        <button 
          type="submit" 
          class="bg-[#C8102E] text-white font-utility font-semibold px-6 py-2.5 hover:bg-[#a80d26] transition-colors"
        >
          বার্তা পাঠান
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
  name: '',
  email: '',
  subject: 'সংবাদ প্রসঙ্গে',
  message: ''
})

const handleSubmit = () => {
  alert('আপনার বার্তা পাঠানো হয়েছে!')
  Object.assign(form, { name: '', email: '', subject: 'সংবাদ প্রসঙ্গে', message: '' })
}
</script>