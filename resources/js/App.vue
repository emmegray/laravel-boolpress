<template>

    <div class="container">
        <h2>All my posts:</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <h4>{{ post.title }}</h4>
                <p>{{ post.content }}</p>
            </li>
        </ul>
    </div>

</template>

<script>
export default {
    name: 'App',
    data() {
        return {
            apiUrl: '/api/posts',
            posts: null
        }
    },
    methods: {
        getApi() {
            axios.get(this.apiUrl)
                .then(res => {
                    this.posts = res.data;
                })
        }
    },
    mounted() {
        this.getApi();
    }
}
</script>

<style>
</style>