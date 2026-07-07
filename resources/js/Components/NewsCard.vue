<template>
  <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
    <Link :href="`/news/${news.slug}`">
      <img :src="news.image" alt="" class="w-full h-48 object-cover" />
      <div class="p-4">
        <h3 class="font-semibold text-lg">{{ news.title }}</h3>
        <p class="text-sm text-gray-500 mt-1">{{ news.excerpt }}</p>
        <div class="mt-2 text-blue-600 text-sm">Read more →</div>
      </div>
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ news: Object })
</script>
