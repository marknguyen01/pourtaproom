<template>
    <div class="menu-content">
        <div class="menu-categories text-center">
            <span v-for="category in categories" v-bind:key="category.id" v-on:click="changeCategory(category.id)" class="menu-category font-size--rg" v-bind:class="{active : (active_category == category.id)}">{{ category.name }}</span>
        </div>
        <div class="menu-items mt-5">
            <div class="row">
                <div class="col-lg-6" v-for="item in items" v-bind:key="item.id">
                    <div class="d-flex">
                        <div class="menu-item-img my-3" v-b-popover.top.hover="item.description != undefined && item.description.length > 0 ? item.description : 'No description'">
                            <img v-bind:src="item.label_image" v-bind:alt="item.name">
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
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        props: ['categoryData', 'itemData'],
        data() {
            return {
                categories: JSON.parse(this.categoryData).sections,
                items: JSON.parse(this.itemData).items,
                active_category: JSON.parse(this.categoryData).sections[0].id,
            }
        },
        methods: {
            changeCategory: function(categoryID) {
                console.log(categoryID);
                axios.get("/menu/" + categoryID).then((res) => {
                    this.items = JSON.parse(res.data).items;
                    this.active_category = categoryID;
                    console.log(JSON.parse(res.data).items);
                })
            }
        },
    }
</script>
