import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('@/components/pages/Home.vue')
  },
  {
    path: '/category/:slug',
    name: 'Category',
    component: () => import('@/components/pages/Category.vue')
  },
  {
    path: '/category/:category/:subcategory',
    name: 'SubCategory',
    component: () => import('@/components/pages/Category.vue')
  },
  {
    path: '/post/:slug',
    name: 'Single',
    component: () => import('@/components/pages/Single.vue')
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('@/components/pages/About.vue')
  },
  {
    path: '/contact',
    name: 'Contact',
    component: () => import('@/components/pages/Contact.vue')
  },
  {
    path: '/search',
    name: 'Search',
    component: () => import('@/components/pages/Search.vue')
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: () => import('@/components/pages/NotFound.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0 }
    }
  }
})

export default router