<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      <article class="lg:col-span-2">
        <span class="text-xs font-utility font-semibold text-[#C8102E] uppercase tracking-wider">ক্রিকেট</span>
        <h1 class="font-display text-3xl sm:text-4xl md:text-5xl leading-tight mt-2 text-[#1A1A1A]">
          মিরপুরে সিরিজের প্রথম টেস্টে দাপুটে জয় বাংলাদেশের
        </h1>
        <p class="font-display text-xl italic text-[#4a4a4a] mt-4 leading-snug">
          টানা তৃতীয় জয়ের রেকর্ড গড়ল টাইগাররা।
        </p>

        <div class="flex items-center justify-between mt-5 py-4 border-y border-[#B08D57]">
          <div class="flex items-center gap-3">
            <img 
              src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=100&h=100&fit=crop" 
              alt="প্রতিবেদক" 
              class="w-11 h-11 rounded-full object-cover"
            />
            <div>
              <p class="font-utility text-sm font-semibold">রাকিব হাসান</p>
              <p class="font-utility text-xs text-[#7a6a4f]">ক্রীড়া প্রতিবেদক • ৩০ মিনিট আগে</p>
            </div>
          </div>
        </div>

        <img 
          src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=1200&h=650&fit=crop" 
          alt="মিরপুর স্টেডিয়াম" 
          class="w-full h-72 sm:h-96 object-cover mt-6"
        />

        <div class="article-body mt-6 text-[#1A1A1A] space-y-4">
          <p class="drop-cap">শের-ই-বাংলা জাতীয় ক্রিকেট স্টেডিয়ামে অনুষ্ঠিত সিরিজের প্রথম টেস্টে দাপুটে জয় তুলে নিয়েছে বাংলাদেশ জাতীয় দল।</p>
          <p>ম্যাচের প্রথম দিনেই টস জিতে ব্যাটিংয়ের সিদ্ধান্ত নেন অধিনায়ক। শুরুতে দুই ওপেনার দ্রুত ফিরলেও মিডল অর্ডারের দৃঢ়তায় ভালো সংগ্রহের দিকে এগিয়ে যায় দল।</p>
          <p>বল হাতে দ্বিতীয় ইনিংসে দুর্দান্ত পারফরম্যান্স দেখান পেস আক্রমণের নেতৃত্বে থাকা বোলার।</p>
        </div>

        <!-- Tags -->
        <div class="flex flex-wrap gap-2 font-utility text-xs mt-8 pt-6 border-t border-[#B08D57]">
          <router-link to="/category/sports" class="border border-[#B08D57] px-3 py-1 hover:bg-[#0C3B2E] hover:text-white transition-colors">ক্রিকেট</router-link>
          <router-link to="/category/sports" class="border border-[#B08D57] px-3 py-1 hover:bg-[#0C3B2E] hover:text-white transition-colors">টেস্ট ক্রিকেট</router-link>
        </div>
      </article>

      <!-- Sidebar -->
      <aside class="space-y-8">
        <div class="border border-[#B08D57] p-5">
          <h2 class="font-display text-xl text-[#0C3B2E] mb-4 pb-3 border-b border-[#B08D57]">সর্বাধিক পঠিত</h2>
          <ol class="space-y-4">
            <li v-for="i in 3" :key="i" class="flex gap-3">
              <span class="font-mast text-3xl text-[#B08D57] leading-none">{{ i }}</span>
              <h3 class="font-display text-base leading-snug hover:text-[#0C3B2E] cursor-pointer">
                <router-link to="/post/1">ঢাকা-চট্টগ্রাম মহাসড়কে যান চলাচল স্বাভাবিক</router-link>
              </h3>
            </li>
          </ol>
        </div>
      </aside>
    </div>
  </div>
</template>

<style scoped>
.drop-cap:first-letter {
  font-family: 'Tiro Bangla', serif;
  float: left;
  font-size: 4.2rem;
  line-height: 0.8;
  padding-right: 0.15em;
  padding-top: 0.1em;
  color: #0C3B2E;
}
</style>