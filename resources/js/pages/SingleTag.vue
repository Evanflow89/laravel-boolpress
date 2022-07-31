<template>
  <div v-if="tag" class="container">
    <h1>{{ tag.name }}</h1>
    <h4 v-if="tag.posts.length > 0">Related Posts:</h4>
    <ul v-if="tag.posts.length > 0">
      <li v-for="post in tag.posts" key="post.id">
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
  name: "SingleTag",
  data() {
    return {
      tag: null,
    };
  },
  created() {
    axios
      .get(`/api/tags/${this.$route.params.slug}`)
      .then((response) => {
        this.tag = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>