<template>
  <div class="bg-red-600 text-white text-sm py-2 overflow-hidden">
    <marquee behavior="scroll" direction="left">
      <span v-for="(headline, i) in headlines" :key="i">
        🔥 {{ headline.title }} &nbsp;&nbsp;
      </span>
    </marquee>
  </div>
</template>

<script setup>
defineProps({ headlines: Array })
</script>
