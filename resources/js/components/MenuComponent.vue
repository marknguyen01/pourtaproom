<template>
    <div class="menu-content">
        <div class="video">
            <div class="video-container">
                <visual
                    video='img\video.mp4'
                    load='visible'
                    autoplay='visible'
                    autopause='visible'
                    loop muted
                    class="w-100 h-100">
                </visual>
                <div class="video-overlay">
                    <div class="video-title font-size--lg text-center w-100">
                        <div class="title-block">
                            <div class="title text-color--white font-weight-normal">
                                Our Daily Selection
                            </div>
                            <div class="sub-title text-color--white">
                                Find your favorite drinks at the largest self-serving taproom in the US
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-categories text-center">
                    <span v-for="category in categories" v-bind:key="category.id" v-on:click="changeCategory(category.id)" class="menu-category font-size--rg" v-bind:class="{active : (active_category == category.id)}">{{ category.name }}</span>
                </div>
            </div>
        </div>
        <div v-if="loading" class="text-center mt-5 menu-loading">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        </div>
        <div class="menu-items mt-5 container-fluid">
            <transition-group tag="div" class="row" name="fade-out-in">
                <div class="col-lg-6" v-for="item in items" v-bind:key="item.id">
                    <div class="d-flex">
                        <div class="menu-item-img my-3" v-b-popover.top.hover="item.description != undefined && item.description.length > 0 ? item.description : 'No description'">
                            <visual :image="item.label_image" v-bind:alt="item.name" load="visible" in-viewport-root-margin='-10% 0%'></visual>
                        </div>
                        <div class="menu-item align-self-center">
                            <div class="menu-item-header">
                                <span class="menu-item-name font-weight-bold font-size--rg">{{ item.tap_number}}. {{ item.name }}</span>
                                <span class="menu-item-dots"></span>
                                <span class="menu-item-abv font-weight-bold font-size--rg">{{ item.abv }}% ABV</span>
                            </div>
                            <div class="menu-item-desc font-size--rg">
                                {{ item.brewery }} | {{ item.style }} | {{ item.ibu }} IBU
                            </div>
                        </div>
                    </div>
                </div>
            </transition-group>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import VueVisual from 'vue-visual';
    import 'vue-visual/index.css';
    export default {
        props: ['categoryData', 'itemData'],
        components: {
            'visual': VueVisual
        },
        data() {
            return {
                categories: JSON.parse(this.categoryData).sections,
                items: JSON.parse(this.itemData).items,
                active_category: JSON.parse(this.categoryData).sections[0].id,
                loading: false,
            }
        },
        methods: {
            changeCategory: function(categoryID) {
                this.loading = true;
                this.items = null;
                axios.get("/menu/" + categoryID).then((res) => {
                    this.items = JSON.parse(res.data).items;
                    this.active_category = categoryID;
                    this.loading = false;
                });
            }
        },
    }
</script>
