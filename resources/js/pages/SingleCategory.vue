<template>
  <div class="container">
    <h1>{{ category.name }}</h1>
    <h4>Related Posts:</h4>
    <ul>
      <li v-for="post in category.posts" key="post.id">{{ post.title }}</li>
    </ul>
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