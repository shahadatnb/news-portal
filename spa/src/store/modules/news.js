import { defineStore } from 'pinia'
import api from '@/services/api'

export const useNewsStore = defineStore('news', {
  state: () => ({
    featured: {},
    secondary: [],
    sports: [],
    economy: [],
    popular: [],
    international: [],
    opinions: [],
    gallery: [],
    categoryPosts: [],
    singlePost: {},
    searchResults: [],
    loading: false,
    error: null
  }),

  actions: {
    async fetchHomeData() {
      this.loading = true
      try {
        const response = await api.get('/home')
        const data = response.data
        this.featured = data.featured
        this.secondary = data.secondary
        this.sports = data.sports
        this.economy = data.economy
        this.popular = data.popular
        this.international = data.international
        this.opinions = data.opinions
        this.gallery = data.gallery
      } catch (error) {
        this.error = error.message
        console.error('Error fetching home data:', error)
      } finally {
        this.loading = false
      }
    },

    async fetchCategory(slug) {
      this.loading = true
      try {
        const response = await api.get(`/category/${slug}`)
        this.categoryPosts = response.data
      } catch (error) {
        this.error = error.message
        console.error('Error fetching category:', error)
      } finally {
        this.loading = false
      }
    },

    async fetchSingle(slug) {
      this.loading = true
      try {
        const response = await api.get(`/post/${slug}`)
        this.singlePost = response.data
      } catch (error) {
        this.error = error.message
        console.error('Error fetching post:', error)
      } finally {
        this.loading = false
      }
    },

    async searchPosts(query) {
      this.loading = true
      try {
        const response = await api.get(`/search?q=${query}`)
        this.searchResults = response.data
      } catch (error) {
        this.error = error.message
        console.error('Error searching:', error)
      } finally {
        this.loading = false
      }
    }
  }
})