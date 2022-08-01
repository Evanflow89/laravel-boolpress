<template>
  <div class="container">
    <h1>{{ post.title }}</h1>
    <img :src="post.image_path" :alt="post.title" />
    <p>{{ post.content }}</p>
    <h3>Author: {{ post.user.name }}</h3>
    <div v-if="post.tags.length > 0">
      <h4>Tags List</h4>
      <ul>
        <li v-for="tag in post.tags" :key="tag.id">
          <router-link
            :to="{ name: 'single-tag', params: { slug: tag.slug } }"
            >{{ tag.name }}</router-link
          >
        </li>
      </ul>
    </div>

    <p class="mt-5">
      <router-link :to="{ name: 'home' }">Back to Home</router-link>
    </p>
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