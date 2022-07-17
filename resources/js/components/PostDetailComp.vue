<template>
  <div>
    <div class="container">
      <h1>{{ post.title }}</h1>
      <i>{{ formatDate }}</i>
      <p>{{ post.content }}</p>
      <h5>{{ post.category.name }}</h5>
      <img :src="post.image" :alt="post.title"></img>
      <h5>Tags:</h5>
      <ul class="list-group">
        <li class="list-group-item" v-for="tag in post.tags" :key="`tag${tag.id}`">{{ tag.name }}</li>
      </ul>
      <router-link :to="{ name: 'blog' }">All posts</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostDetailComp",
  data() {
    return {
      slug: this.$route.params.slug,
      post: [],
      apiUrl: "/api",
    };
  },
  computed: {
    formatDate() {
      const d = new Date(this.post.updated_at);
      let day = d.getDate();
      let month = d.getMonth();
      const year = d.getFullYear();
      day = this.checkDate(day);
      month = this.checkDate(month);
      const formattedDate = `${day}/${month}/${year}`;
      return formattedDate;
    },
  },
  methods: {
    getApi() {
      axios
        .get(this.apiUrl + "/posts/" + this.slug)
        .then((response) => {
          const rd = response.data;
          this.post = res.data;
        });
    },
    checkDate(dateToCheck) {
      if (dateToCheck < 10) {
        dateToCheck = "0" + dateToCheck;
      }
      return dateToCheck;
    },
  },
  mounted() {
    this.getApi();
  },
};
</script>

<style>
</style>
