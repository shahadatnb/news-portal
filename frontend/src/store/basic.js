import { ref, reactive, onBeforeMount } from 'vue'
import axios from 'axios'
const basicStore = reactive({
    //serverUrl: 'https://ecom.asiancoder.com',
    serverUrl: 'https://news-portal.test',
    //serverUrl: 'http://localhost/laravel/laravel-10-vue-ecom/public',
    baseUrl: '',
    settings: [],
    loading: false,
    init() {
        axios.get(`${basicStore.serverUrl}/api/config`)
        .then(res => {
            basicStore.settings = res.data
            basicStore.loading = false
        });
    }
})

//basicStore.init()

export {
    basicStore
}