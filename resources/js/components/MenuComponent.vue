<template>
    <div class="menu-container">
        <div class="video">
            <div class="video-container">
                <visual
                    video='img\video.mp4'
                    load='visible'
                    autoplay='visible'
                    autopause='visible'
                    transition='vv-fade'
                    loop muted
                    class="w-full h-full">
                </visual>
                <div class="video-overlay">
                    <div class="video-title text-center w-screen">
                        <div class="title-block">
                            <div class="title text-white">
                                Our Daily Selection
                            </div>
                            <div class="sub-title text-white">
                                Find your favorite drinks at the largest self-serving taproom in the US
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-categories text-center">
                    <span v-for="category in categories" v-bind:key="category.id" v-on:click="changeCategory(category.id)"
                    class="menu-category" v-bind:class="{active : (active_category == category.id)}">{{ category.name }}</span>
                </div>
            </div>
        </div>
        <div v-if="loading" class="text-center mt-5 menu-loading">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        </div>
        <div class="menu-items container">
            <transition-group tag="div" class="flex flex-wrap -mx-4" name="fade-out-in">
                <div class="w-full lg:w-1/2 px-4" v-for="item in items" v-bind:key="item.id">
                    <div class="flex">
                        <div class="menu-item-img my-3" v-tooltip.top-start="item.description != undefined && item.description.length > 0 ? item.description : 'No description'">
                            <visual :image="item.label_image" v-bind:alt="item.name" load="visible" in-viewport-root-margin='-10% 0%' transition='vv-fade'></visual>
                        </div>
                        <div class="menu-item self-center">
                            <div class="menu-item-header">
                                <span class="menu-item-name">{{ item.tap_number}}. {{ item.name }}</span>
                                <span class="menu-item-dots"></span>
                                <span class="menu-item-abv">{{ item.abv }}% ABV</span>
                            </div>
                            <div class="menu-item-desc">
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
    import { VTooltip, VPopover, VClosePopover} from 'v-tooltip';
    export default {
        props: ['categoryData', 'itemData'],
        components: {
            'visual': VueVisual,
            'v-popover': VPopover,
        },
        directives: {
            'tooltip': VTooltip,
            'close-popover': VClosePopover,
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
