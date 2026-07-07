<template>
  <div class="max-w-2xl mx-auto px-4 sm:px-6 py-24 text-center">
    <p class="font-mast text-9xl text-[#B08D57] leading-none">৪০৪</p>
    <h1 class="font-display text-3xl text-[#0C3B2E] mt-4">এই পেজটি খুঁজে পাওয়া যায়নি</h1>
    <p class="font-utility text-sm text-[#7a6a4f] mt-3 leading-relaxed">
      যে সংবাদটি আপনি খুঁজছেন তা সরিয়ে ফেলা হয়েছে অথবা লিংকটি সঠিক নয়।
    </p>
    <div class="flex items-center justify-center gap-4 mt-8">
      <router-link to="/" class="bg-[#0C3B2E] text-white font-utility text-sm font-semibold px-6 py-2.5 hover:bg-[#0a2f24] transition-colors">
        প্রচ্ছদে ফিরুন
      </router-link>
      <router-link to="/search" class="border border-[#B08D57] font-utility text-sm font-semibold px-6 py-2.5 hover:bg-[#0C3B2E] hover:text-white transition-colors">
        সংবাদ খুঁজুন
      </router-link>
    </div>
  </div>
</template>