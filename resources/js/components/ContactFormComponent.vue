<template>
    <form method="POST" v-bind:action="routeData" class="mt-3 mt-md-4 mt-lg-5" v-on:submit="contact">
        <div class="flex flex-wrap -mx-4">
            <div class="form-group w-1/2 px-4">
                <input type="text" placeholder="First Name" name="first_name" v-model.trim="first_name" required>
            </div>
            <div class="form-group w-1/2 px-4">
                <input type="text" placeholder="Last Name" name="last_name" v-model.trim="last_name" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="form-group w-1/2 px-4">
                <input type="tel" placeholder="Phone Number" name="phone_number" v-model.number="phone_number" required>
            </div>
            <div class="form-group w-1/2 px-4">
                <input type="email" placeholder="Email Address" name="email" v-model="email" required>
            </div>
        </div>
        <div class="flex flex-wrap lg:-mx-4">
            <div class="form-group w-full lg:w-1/2 lg:px-4">
                <input type="text" placeholder="Company Name (not required)" name="company" v-model="company">
            </div>
            <div class="form-group w-full lg:w-1/2 lg:px-4">
                <input type="text" placeholder="Event Type" name="event" v-model="event" required>
            </div>
        </div>
        <div class="flex flex-wrap lg:-mx-4">
            <div class="form-group w-full lg:w-1/2 lg:px-4">
                <datetime v-model="date_time" name="date_time" type="datetime" use12-hour :minute-step="15" :min-datetime="new Date().toISOString()"
                value-zone="America/New_York" placeholder="Date and Time" required></datetime>
            </div>
            <div class="form-group w-full lg:w-1/2 lg:px-4">
                <input type="number" placeholder="Estimated number of people" name="num_people" v-model="num_people" required>
            </div>
        </div>
        <div class="form-group">
            <textarea placeholder="Catering Needs (not required)" name="catering" v-model="catering"></textarea>
        </div>
        <button type="submit" class="contact-btn btn btn-transparent mt-3 w-50">
            <div class="lds-ellipsis" v-if="loading"><div></div><div></div><div></div><div></div></div>
            <span v-if="!loading">Submit Inquiry</span>
        </button>
    </form>
</template>

<script>
    import axios from "axios";
    import {Datetime} from 'vue-datetime'
    import 'vue-datetime/dist/vue-datetime.css'
    export default {
        props: ['routeData'],
        components: {
            datetime: Datetime
        },
        data() {
            return {
                route: this.routeData,
                first_name: null,
                last_name: null,
                phone_number: null,
                email: null,
                company: null,
                event: null,
                date_time: null,
                num_people: null,
                catering: null,
                loading: false,
            }
        },
        methods: {
            contact: function(event) {
                event.preventDefault();
                this.loading = true;
                let that = this;
                let payload = {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    phone_number: this.phone_number,
                    email: this.email,
                    company: this.company,
                    event: this.event,
                    date_time: this.date_time,
                    num_people: this.num_people,
                    catering: this.catering,
                };
                let axiosConfig = {
                    headers: {
                        'Content-Type': 'application/json;charset=UTF-8',
                    }
                };
                axios.post(this.route, payload, axiosConfig).then(res => {
                    this.$swal.fire({
                        type: 'success',
                        title: res.data.title,
                        text: res.data.message.toString()
                    });
                }).catch(err => {
                    this.$swal.fire({
                        type: 'error',
                        title: err.response.data.title,
                        text: err.response.data.message.toString()
                    });
                }).then(() => {
                    that.loading = false;
                })
            }
        },
    }
</script>
