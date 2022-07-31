<template>
  <div class="container">
    <h1>{{ category.name }}</h1>
    <h4 v-if="category.posts.length > 0">Related Posts:</h4>
    <ul v-if="category.posts.length > 0">
      <li v-for="post in category.posts" key="post.id">
        <router-link
          :to="{ name: 'single-post', params: { slug: post.slug } }"
          >{{ post.title }}</router-link
        >
      </li>
    </ul>
    <h4 v-else>No Posts Related</h4>
  </div>
</template>

<script>
export default {
  name: "SingleCategory",
  data() {
    return {
      category: null,
    };
  },
  created() {
    axios
      .get(`/api/categories/${this.$route.params.slug}`)
      .then((response) => {
        this.category = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>