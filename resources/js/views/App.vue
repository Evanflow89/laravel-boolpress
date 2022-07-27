<template>
  <div>
    <base-header />
    <base-main />
    <base-footer />
    <ul>
      <li v-for="post in posts" key="post.slug">
        {{ post.title }}
      </li>
    </ul>
  </div>
</template>

<script>
import BaseHeader from "../components/macro/BaseHeader.vue";
import BaseMain from "../components/macro/BaseMain.vue";
import BaseFooter from "../components/macro/BaseFooter.vue";

export default {
  name: "App",
  data() {
    return {
      posts: [],
    };
  },
  components: {
    BaseHeader,
    BaseMain,
    BaseFooter,
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