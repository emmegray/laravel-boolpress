<template>

    <div>
        <HeaderCompVue />
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
        <FooterCompVue />
    </div>

</template>

<script>
import axios from "axios";
import HeaderCompVue from "./HeaderComp.vue";
import FooterCompVue from "./FooterComp.vue";

export default {
    name: 'App',
    components: {
        HeaderCompVue,
        FooterCompVue,
    }
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
