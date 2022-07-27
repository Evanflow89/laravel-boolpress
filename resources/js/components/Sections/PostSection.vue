<template>
  <section>
    <div class="container">
      <ul>
        <li v-for="post in posts" key="post.slug">
          {{ post.title }}
        </li>
      </ul>
    </div>
  </section>
</template>

<script>
export default {
  name: "PostSection",
  data() {
    return {
      posts: [],
    };
  },
  created() {
    axios
      .get("http://localhost:8000/api/posts")
      .then((response) => {
        this.posts = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>