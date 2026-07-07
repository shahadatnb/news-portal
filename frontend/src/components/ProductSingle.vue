<template>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Product Detail</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-detail-top">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img :src="product.photo" alt="Product Image">
<!--                                    <template v-for="gallery in product.galleries" :key="gallery.id + '1'">-->
                                        <img v-for="gallery in product.galleries" :key="gallery.id + '1'" :src="gallery.photo" alt="Product Image">
<!--                                    </template>-->
                                </div>
                                <div v-if="product.galleries && product.galleries.length > 0" class="product-slider-single-nav normal-slider">
                                    <div class="slider-nav-img"><img :src="product.photo" alt="Product Image"></div>
<!--                                    <template v-for="gallery in product.galleries" :key="gallery.id">-->
                                    <div v-for="gallery in product.galleries" :key="gallery.id" class="slider-nav-img">
                                        <img :src="gallery.photo" alt="Product Image">
                                    </div>
<!--                                    </template>-->
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2>{{ product.title }}</h2></div>
                                    <!-- <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        (54 customer reviews)
                                    </div> -->
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p>৳{{ product.price }} <span>৳{{ product.reduced_price }}</span></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <div class="qty">
                                            <button @click="decreaseQuantity()" class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" v-model="quantity">
                                            <button @click="increaseQuantity()" class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                   <div class="p-color" v-if="product.colors != ''">
                                       <h4>Color:</h4>
                                       <div v-for="(color, index) in product.colors" :key="index" class="btn-group btn-group-sm">
                                           <button v-on:click="selectColor(index)"  :style="{ backgroundColor: color }" type="button" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                       </div>
                                   </div>

                                   <div class="p-size" v-if="product.sizes != ''">
                                       <h4>Weight:</h4>
                                       <div v-for="(size, index) in product.sizes" :key="index" class="btn-group btn-group-sm">
                                           <button v-on:click="selectSize(index)" type="button" class="btn">{{ size }}</button>
                                       </div>
                                   </div>

                                    <div class="action">
                                        <!-- <a class="btn" @click="cart.addItem(product)" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a> -->
                                        <button class="btn btn-block" @click="cart.addItem(product, quantity)" type="button"><i class="fa fa-shopping-bag"></i> Add to Cut</button>
                                        <button class="btn btn-warning btn-block" @click="cart.addItem(product, quantity,1)"><i class="fa fa-shopping-cart"></i> ক্যাশ অন ডেলিভারি তে অর্ডার করুন</button>
                                        <a :href="basic.settings.messenger" target="_blank" class="btn btn-warning btn-block"><i class="fab fa-facebook-messenger"></i> Chat with us</a>
                                        <a :href="whatapp" target="_blank" class="btn btn-success btn-block"><i class="fab fa-whatsapp"></i> WhatsApp us</a>
                                    </div>
                                </div>
                                <div class="row product-detail-bottom">
                                    <div class="col-lg-12">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="description" class="container tab-pane active">
                                                <!-- <h4>Product description</h4> -->
                                                <div v-html="product.description "></div>
                                            </div>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Related Products</h1>
            </div>
            <div class="row align-items-center">
                <div v-for="product in products" :key="product.id" class="col-lg-3">
                    <Product :product="product"></Product>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, watch, onUpdated, ref } from 'vue'
import Product from "./homepage/Product.vue";
import axios from 'axios'
import { basicStore } from "../store/basic.js";
const basic = basicStore;
import { useRoute } from 'vue-router';
const route = useRoute()
const products = ref([])
const slug = route.params.slug
const product = reactive({})
watch(() => route.params.slug, fetchData, { immediate: true });

async function fetchData(data) {
    basic.loading = true
    axios.get(`${basic.serverUrl}/api/single-product/${data}`)
        .then(res => {
            //console.log(res.data)
            product_title_original.value = res.data.data.title;
            product.id = res.data.data.id
            product.title = res.data.data.title
            product.price = res.data.data.price
            product.reduced_price = res.data.data.reduced_price
            product.quantity = res.data.data.quantity
            product.short_description = res.data.data.short_description
            product.description = res.data.data.description
            product.photo = res.data.data.photo
            product.galleries = res.data.data.galleries
            product.categories = res.data.data.categories
            document.title = product.title;
            document
            .querySelector("meta[property='og:image']")
            .setAttribute("content", product.photo);
            document
            .querySelector("meta[property='og:title']")
            .setAttribute("content", product.title);
            basic.loading = false;
        });

     axios.get(`${basic.serverUrl}/api/latest-products?take=8&orderBy=id&orderType=random`)
        .then(res => {
            products.value = res.data.data
        });
    }

</script>

<style scoped>

</style>
