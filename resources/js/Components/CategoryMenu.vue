<template>
  <div class="relative group">
    <button class="text-gray-700">Categories ▾</button>
    <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-md w-40 z-50">
      <Link v-for="c in categories" :key="c.id" :href="`/category/${c.slug}`"
            class="block px-3 py-2 hover:bg-gray-100">
        {{ c.name }}
      </Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ categories: Array })
</script>
