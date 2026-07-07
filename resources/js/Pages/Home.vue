<template>
  <FrontLayout :headlines="headlines">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Main column (2/3) -->
      <div class="lg:col-span-2 space-y-8">
        <!-- Hero / Top feature -->
        <!-- <div class="relative rounded-lg overflow-hidden shadow-lg">
          <img :src="hero.image" alt="" class="w-full h-72 object-cover" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
            <div class="text-white">
              <div class="text-sm mb-1">{{ hero.category }}</div>
              <h1 class="text-2xl md:text-4xl font-bold leading-tight">{{ hero.title }}</h1>
              <p class="mt-2 max-w-2xl text-sm">{{ hero.excerpt }}</p>
            </div>
          </div>
        </div> -->

        <!-- Grid of featured small cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <article v-for="item in featured" :key="item.id" class="bg-white rounded-lg overflow-hidden shadow">
            <div class="flex gap-4">
              <img :src="item.image" class="w-36 h-24 object-cover" alt="" />
              <div class="p-4">
                <div class="text-xs text-indigo-600 font-semibold">{{ item.category }}</div>
                <h3 class="font-semibold text-lg mt-1">{{ item.title }}</h3>
                <p class="text-sm text-gray-500 mt-2">{{ item.excerpt }}</p>
              </div>
            </div>
          </article>
        </div>

        <!-- Latest news list (classic list with thumbnails) -->
        <section>
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">সর্বশেষ খবর</h2>
            <Link href="/news" class="text-sm text-indigo-600">আরও দেখ</Link>
          </div>

          <div class="grid grid-cols-1 gap-4">
            <article v-for="n in latest" :key="n.id" class="bg-white p-4 rounded-lg shadow flex gap-4">
              <img :src="n.image" class="w-32 h-20 object-cover rounded" alt="" />
              <div>
                <div class="text-xs text-gray-400">{{ n.published_at }}</div>
                <h3 class="font-semibold">{{ n.title }}</h3>
                <p class="text-sm text-gray-600 mt-1">{{ n.excerpt }}</p>
                <div class="mt-2 text-sm text-indigo-600"><Link :href="`/news/${n.slug}`">বিস্তারিত →</Link></div>
              </div>
            </article>
          </div>

          <!-- pagination (simple) -->
          <div class="mt-6 flex justify-center">
            <!-- <Pagination :links="pagination.links" /> -->
          </div>
        </section>
      </div>

      <!-- Sidebar (1/3) -->
      <aside class="space-y-6">
        <!-- Subscribe card -->
        <div class="bg-white p-5 rounded-lg shadow">
          <h3 class="font-semibold text-lg">সাবস্ক্রাইব করে আপডেট নাও</h3>
          <p class="text-sm text-gray-600 mt-2">নিয়মিত নিউজ সরাসরি ইমেইলে পেতে সাবস্ক্রাইব করো।</p>
          <form class="mt-4 flex gap-2">
            <input type="email" placeholder="ইমেইল লিখো" class="flex-1 px-3 py-2 border rounded" />
            <button class="px-4 py-2 bg-indigo-600 text-white rounded">সাবস্ক্রাইব</button>
          </form>
        </div>

        <!-- Popular posts -->
        <div class="bg-white p-5 rounded-lg shadow">
          <h4 class="font-semibold mb-3">জনপ্রিয় খবর</h4>
          <ul class="space-y-3">
            <li v-for="p in popular" :key="p.id" class="flex gap-3">
              <img :src="p.image" class="w-16 h-12 object-cover rounded" alt="" />
              <div>
                <h5 class="text-sm font-medium">{{ p.title }}</h5>
                <div class="text-xs text-gray-400">{{ p.published_at }}</div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Categories -->
        <div class="bg-white p-5 rounded-lg shadow">
          <h4 class="font-semibold mb-3">ক্যাটাগরি</h4>
          <div class="flex flex-wrap gap-2">
            <Link v-for="c in categories" :key="c.id" :href="`/category/${c.slug}`" class="text-sm px-3 py-1 border rounded text-gray-700 hover:bg-indigo-50">{{ c.name }}</Link>
          </div>
        </div>
      </aside>
    </div>
  </FrontLayout>
</template>

<script setup>
import FrontLayout from '@/Components/FrontLayout.vue'
import Pagination from '@/Components/Pagination.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  hero: Object,
  featured: Array,
  latest: Array,
  popular: Array,
  categories: Array,
  headlines: Array,
  pagination: Object
})
</script>