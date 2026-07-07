<template>
  <div class="min-h-screen bg-[#FAF6EE]">
    <!-- Utility Strip -->
    <AppHeader />

    <!-- Desktop Navigation -->
    <DesktopNav />

    <!-- Mobile Menu -->
    <MobileMenu />

    <!-- Main Content -->
    <main class="flex-grow">
      <slot />
    </main>

    <!-- Footer -->
    <AppFooter />
  </div>
</template>

<script setup>
import AppHeader from '@/components/common/AppHeader.vue'
import DesktopNav from '@/components/common/DesktopNav.vue'
import MobileMenu from '@/components/common/MobileMenu.vue'
import AppFooter from '@/components/common/AppFooter.vue'
</script>