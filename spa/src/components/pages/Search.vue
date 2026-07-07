<template>
  <div class="max-w-4xl mx-auto px-4 sm:px-6 py-10">
    <h1 class="font-display text-3xl text-[#0C3B2E] mb-1">অনুসন্ধান ফলাফল</h1>
    <p class="font-utility text-sm text-[#7a6a4f] mb-8">
      "ক্রিকেট" শব্দের জন্য ৩৬টি ফলাফল পাওয়া গেছে
    </p>

    <div class="space-y-6">
      <div v-for="i in 3" :key="i" class="flex gap-5 items-start pb-6 border-b border-[#B08D57]">
        <router-link to="/post/1" class="shrink-0">
          <img 
            src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=300&h=200&fit=crop" 
            alt="ক্রিকেট" 
            class="w-36 h-24 object-cover"
          />
        </router-link>
        <div>
          <span class="text-xs font-utility font-semibold text-[#C8102E] uppercase tracking-wider">খেলাধুলা</span>
          <h3 class="font-display text-xl leading-snug mt-1 hover:text-[#0C3B2E]">
            <router-link to="/post/1">মিরপুরে সিরিজের প্রথম টেস্টে দাপুটে জয় বাংলাদেশের</router-link>
          </h3>
          <p class="font-utility text-xs text-[#7a6a4f] mt-2">৩০ মিনিট আগে</p>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <nav class="flex items-center justify-center gap-2 pt-10">
      <span class="font-utility text-sm w-10 h-10 flex items-center justify-center bg-[#0C3B2E] text-white">১</span>
      <a href="#" class="font-utility text-sm w-10 h-10 flex items-center justify-center border border-[#B08D57] hover:bg-[#0C3B2E] hover:text-white transition-colors">২</a>
      <a href="#" class="font-utility text-sm w-10 h-10 flex items-center justify-center border border-[#B08D57] hover:bg-[#0C3B2E] hover:text-white transition-colors">৩</a>
    </nav>
  </div>
</template>