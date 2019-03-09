<template>
    <div>
        <div>
            <button class="btn btn-primary" @click="send">Send Request</button>
        </div>

        <div>
            <i class="mt-3 fa fa-spinner fa-pulse fa-3x fa-fw" v-if="loading"></i>
        </div>

        <div v-for="post in posts" :key="post.key">
            <h1>{{ post.title }}</h1>
            <p>
                {{ post.body }} 
            </p>
            <hr>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            loading: false
        }
    },
    methods: {
        send() {
            this.loading = true;
            axios.get('https://jsonplaceholder.typicode.com/posts').then(response => {
                this.posts = response.data;
                this.loading = false;
            });
        }
    }
}
</script>

