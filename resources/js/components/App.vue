<template>
    <div class="container">
        <div v-if="posts" class="row">
            <div v-for="post in posts" :key="post.id" class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ post.title }}</div>

                    <div class="card-body">
                        {{ post.content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            posts: []
        }
    },
    methods: {
        savePosts(posts) {
            this.posts = posts;
        }
    },
    mounted() {
        axios.get("/api/posts")
            .then(json => {
                this.savePosts(json.data);
            })
    }
}
</script>
