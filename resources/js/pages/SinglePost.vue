<template>
  <div class="container">
    <h1>{{ post.title }}</h1>
    <p>{{ post.content }}</p>
    <h3>Author: {{ post.user.name }}</h3>
  </div>
</template>

<script>
export default {
  name: "SinglePost",
  data() {
    return {
      post: null,
    };
  },
  created() {
    axios
      .get(`/api/posts/${this.$route.params.slug}`)
      .then((response) => {
        this.post = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>