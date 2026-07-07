<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    <!-- Breaking News Ticker -->
    <BreakingTicker />
    
    <!-- Hero Section -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-8 border-b hairline">
      <div class="lg:col-span-2">
        <FeatureStory :story="featuredStory" />
      </div>
      <aside class="flex flex-col divide-y hairline">
        <SecondaryStory 
          v-for="story in secondaryStories" 
          :key="story.id"
          :story="story"
        />
      </aside>
    </section>

    <!-- Content Grid -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-10">
      <div class="lg:col-span-2">
        <!-- Category Feed: Sports -->
        <CategoryFeed 
          title="খেলাধুলা"
          category="/category/sports"
          :stories="sportsStories"
        />
        
        <!-- Category Feed: Economy -->
        <CategoryFeed 
          title="অর্থনীতি"
          category="/category/economy"
          :stories="economyStories"
          class="mt-12"
        />
      </div>

      <!-- Sidebar -->
      <aside class="space-y-8">
        <PopularStories :stories="popularStories" />
        <WeatherWidget />
        <AdBanner size="300x400" color="red" />
      </aside>
    </section>

    <!-- International Section -->
    <section class="mt-12">
      <SectionHeader title="আন্তর্জাতিক" path="/category/international" />
      <div class="grid sm:grid-cols-3 gap-6">
        <StoryCard 
          v-for="story in internationalStories" 
          :key="story.id"
          :story="story"
        />
      </div>
    </section>

    <!-- Opinion Section -->
    <section class="mt-12">
      <SectionHeader title="মতামত" path="/category/opinion" />
      <div class="grid sm:grid-cols-2 gap-8">
        <OpinionCard 
          v-for="op in opinionStories" 
          :key="op.id"
          :opinion="op"
        />
      </div>
    </section>

    <!-- Photo Gallery -->
    <section class="mt-12">
      <SectionHeader title="ছবিতে বাংলাদেশ" path="/category/gallery" />
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <GalleryImage 
          v-for="image in galleryImages" 
          :key="image.id"
          :image="image"
        />
      </div>
    </section>

    <!-- Newsletter CTA -->
    <NewsletterCTA />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useNewsStore } from '@/store/modules/news'

// Import components
import BreakingTicker from '@/components/home/BreakingTicker.vue'
import FeatureStory from '@/components/home/FeatureStory.vue'
import SecondaryStory from '@/components/home/SecondaryStory.vue'
import CategoryFeed from '@/components/home/CategoryFeed.vue'
import PopularStories from '@/components/home/PopularStories.vue'
import WeatherWidget from '@/components/common/WeatherWidget.vue'
import AdBanner from '@/components/common/AdBanner.vue'
import SectionHeader from '@/components/common/SectionHeader.vue'
import StoryCard from '@/components/common/StoryCard.vue'
import OpinionCard from '@/components/home/OpinionCard.vue'
import GalleryImage from '@/components/home/GalleryImage.vue'
import NewsletterCTA from '@/components/home/NewsletterCTA.vue'

const newsStore = useNewsStore()

// Data
const featuredStory = ref({})
const secondaryStories = ref([])
const sportsStories = ref([])
const economyStories = ref([])
const popularStories = ref([])
const internationalStories = ref([])
const opinionStories = ref([])
const galleryImages = ref([])

// Load data on mount
onMounted(async () => {
  await newsStore.fetchHomeData()
  featuredStory.value = newsStore.featured
  secondaryStories.value = newsStore.secondary
  sportsStories.value = newsStore.sports
  economyStories.value = newsStore.economy
  popularStories.value = newsStore.popular
  internationalStories.value = newsStore.international
  opinionStories.value = newsStore.opinions
  galleryImages.value = newsStore.gallery
})
</script>