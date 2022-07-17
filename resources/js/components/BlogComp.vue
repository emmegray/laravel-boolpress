<template>
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">All my posts:</h1>
    <LoaderComp v-if="!posts" />
    <div v-else>
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
  </div>
</template>

<script>
import PostItem from "./partials/PostItem";
import LoaderComp from "./partials/LoaderComp";

export default {
  name: "BlogComp",
  components: {
    PostItem,
    LoaderComp,
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
        /*
            categories: [{id: 1, name: "HTML", slug: "html", created_at: "2022-07-16T13:01:04.000000Z",…},…]
            posts: {
              current_page: 1
              data: [{id: 1, category_id: 1, title: "Post title example", slug: "post-title-example",…},…]
            }
         */
        this.posts = res.data.posts.data;
        this.pagination = {
          current: res.data.posts.current_page,
          last: res.data.posts.last_page,
        };
      });
    },
  },
};
</script>

<style>
</style>
