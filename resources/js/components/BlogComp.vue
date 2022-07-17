<template>
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">All my posts:</h1>
    <div class="col-lg-6 mx-auto">
      <PostItem v-for="post in posts" :key="post.id" :post="post" />
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button
          @click="getApi(pagination.current - 1)"
          :disabled="pagination.current === 1"
        >
          ⬅️
        </button>

        <button
          v-for="i in pagination.last"
          :key="i"
          @click="getApi(1)"
          :disabled="pagination.current === i"
        >
          {{ i }}
        </button>

        <button
          @click="getApi(pagination.current + 1)"
          :disabled="pagination.current === pagination.last"
        >
          ➡️
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import PostItem from "./partials/PostItem";

export default {
  name: "BlogComp",
  components: {
    PostItem,
  },
  data() {
    return {
      apiUrl: "/api/posts",
      posts: [],
      pagination: {
        current: null,
        last: null,
      },
      categories: [],
      tags: [],
      showPagination: true,
      postFilterdByCat: false,
      postFilterdByTag: false,
      category_slug: "",
      tag_slug: "",
    };
  },
  mounted() {
    this.getApi(1);
  },
  methods: {
    getApi(page) {
      axios.get(this.apiUrl + "?page=" + page).then((res) => {
        this.posts = res.data.data;
        this.pagination = {
          current: res.data.current_page,
          last: res.data.last_page,
        };
      });
    },
  },
};
</script>

<style>
</style>
