<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    <!-- Breadcrumb -->
    <p class="font-utility text-xs text-[#7a6a4f]">
      <router-link to="/" class="hover:underline">প্রচ্ছদ</router-link>
      <span class="mx-1">/</span>
      <span class="text-[#0C3B2E]">খেলাধুলা</span>
    </p>

    <!-- Category header -->
    <div class="flex items-end justify-between border-b-2 border-[#B08D57] pb-4 mb-8">
      <h1 class="font-display text-4xl text-[#0C3B2E]">খেলাধুলা</h1>
      <p class="font-utility text-xs text-[#7a6a4f] hidden sm:block">১৪২টি প্রতিবেদন</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      <div class="lg:col-span-2 space-y-8">
        <div v-for="i in 5" :key="i" class="flex gap-5 items-start pb-6 border-b border-[#B08D57]">
          <router-link to="/post/1" class="shrink-0">
            <img 
              src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=300&h=200&fit=crop" 
              alt="ক্রিকেট" 
              class="w-40 h-28 object-cover"
            />
          </router-link>
          <div>
            <span class="text-xs font-utility font-semibold text-[#0C3B2E] uppercase tracking-wider">ক্রিকেট</span>
            <h3 class="font-display text-xl leading-snug mt-1 hover:text-[#0C3B2E] cursor-pointer">
              <router-link to="/post/1">মিরপুরে সিরিজের প্রথম টেস্টে দাপুটে জয় বাংলাদেশের</router-link>
            </h3>
            <p class="text-sm text-[#4a4a4a] mt-1 leading-relaxed">টানা তৃতীয় জয়ের রেকর্ড গড়ল টাইগাররা।</p>
            <p class="font-utility text-xs text-[#7a6a4f] mt-2">{{ i }} ঘণ্টা আগে</p>
          </div>
        </div>

        <!-- Load more -->
        <div class="text-center pt-2">
          <button 
            @click="loadMore" 
            type="button" 
            class="font-utility text-sm font-semibold px-6 py-3 border-2 border-[#0C3B2E] text-[#0C3B2E] hover:bg-[#0C3B2E] hover:text-white transition-colors"
          >
            আরও সংবাদ দেখুন
          </button>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="space-y-8">
        <div class="border border-[#B08D57] p-5">
          <h2 class="font-display text-xl text-[#0C3B2E] mb-4 pb-3 border-b border-[#B08D57]">এই বিভাগে সর্বাধিক পঠিত</h2>
          <ol class="space-y-4">
            <li v-for="i in 3" :key="i" class="flex gap-3">
              <span class="font-mast text-3xl text-[#B08D57] leading-none">{{ i }}</span>
              <h3 class="font-display text-base leading-snug hover:text-[#0C3B2E] cursor-pointer">
                <router-link to="/post/1">মিরপুরে সিরিজের প্রথম টেস্টে দাপুটে জয়</router-link>
              </h3>
            </li>
          </ol>
        </div>
      </aside>
    </div>
  </div>
</template>

<script setup>
const loadMore = () => {
  alert('আরও সংবাদ লোড হচ্ছে...')
}
</script>