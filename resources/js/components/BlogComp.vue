<template>
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">All my {{searchType}} posts:</h1>
    <LoaderComp v-if="!posts" />
    <div v-else>
      <div class="col-lg-6 mx-auto">
        <PostItem v-for="post in posts" :key="post.slug" :post="post" />

        <SidebarComp
          :categories="categories"
          :tags="tags"
          @searchPostByCategory="searchPostByCategory"
          @searchPostByTag="searchPostByTag"
        />

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
import SidebarComp from "./partials/SidebarComp";

export default {
  name: "BlogComp",
  components: {
    PostItem,
    LoaderComp,
    SidebarComp,
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
      searchType: '',
    };
  },
  mounted() {
    this.getApi(1);
  },
  methods: {
    getApi(page) {
      this.posts = null;
       this.searchType = ''
      axios.get(this.apiUrl + "?page=" + page).then((res) => {
        this.posts = res.data.posts.data;
        this.pagination = {
          current: res.data.posts.current_page,
          last: res.data.posts.last_page,
        };
        this.categories = res.data.categories;
        this.tags = res.data.tags;
      });
    },
    searchPostByCategory(slug_category) {
      this.showPagination = false;
      this.getPostsByTagCategory("/post-category/", slug_category);
    },
    searchPostByTag(slug_tag) {
      this.showPagination = false;
      this.getPostsByTagCategory("/post-tag/", slug_tag);
    },
    getPostsByTagCategory(uri, slug) {
      axios.get(this.apiUrl + uri + slug).then((res) => {
        this.searchType = res.data.name;
        this.posts = res.data.posts;
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
