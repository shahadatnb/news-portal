import { createApp } from 'vue'
import router from './router/router.js'
import $ from 'jquery';
window.$ = window.jQuery = $;
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
import 'jquery.easing'; // This imports the easing functions
import '../src/assets/lib/owlcarousel/owl.carousel.min.js'
import './style.css'
import App from './App.vue'
createApp(App)
    .use(router)
    .mount('#app')
