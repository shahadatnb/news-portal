<template>
  <footer class="bg-[#0C3B2E] text-[#FAF6EE] mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 grid grid-cols-2 sm:grid-cols-4 gap-8">
      <div class="col-span-2 sm:col-span-1">
        <h3 class="font-mast text-3xl mb-3">দৈনিক সময়</h3>
        <p class="font-utility text-xs opacity-75 leading-relaxed">১২৩ প্রেস ক্লাব রোড, মতিঝিল, ঢাকা-১০০০</p>
      </div>
      <div>
        <h4 class="font-utility text-sm font-semibold mb-3 opacity-90">বিভাগ</h4>
        <ul class="font-utility text-xs space-y-2 opacity-75">
          <li v-for="item in categories" :key="item.label">
            <router-link :to="item.path" class="hover:underline">{{ item.label }}</router-link>
          </li>
        </ul>
      </div>
      <div>
        <h4 class="font-utility text-sm font-semibold mb-3 opacity-90">প্রতিষ্ঠান</h4>
        <ul class="font-utility text-xs space-y-2 opacity-75">
          <li><router-link to="/about" class="hover:underline">আমাদের সম্পর্কে</router-link></li>
          <li><router-link to="/contact" class="hover:underline">যোগাযোগ</router-link></li>
          <li><a href="#" class="hover:underline">গোপনীয়তা নীতি</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-utility text-sm font-semibold mb-3 opacity-90">যোগাযোগ মাধ্যম</h4>
        <ul class="font-utility text-xs space-y-2 opacity-75">
          <li><a href="#" class="hover:underline">ফেসবুক</a></li>
          <li><a href="#" class="hover:underline">ইউটিউব</a></li>
          <li><a href="#" class="hover:underline">এক্স</a></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-white/10 py-4 text-center font-utility text-xs opacity-60">
      © ২০২৬ দৈনিক সময়। সর্বস্বত্ব সংরক্ষিত।
    </div>
  </footer>
</template>

<script setup>
const categories = [
  { label: 'জাতীয়', path: '/category/national' },
  { label: 'রাজনীতি', path: '/category/politics' },
  { label: 'খেলাধুলা', path: '/category/sports' },
  { label: 'বিনোদন', path: '/category/entertainment' }
]
</script>