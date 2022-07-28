<template>
  <section class="postSection">
    <div class="container">
      <ul class="d-flex flex-wrap">
        <li class="col-4" v-for="post in posts" key="post.slug">
          <base-card
            :title="post.title"
            :content="post.content"
            :slug="post.slug"
          />
        </li>
      </ul>
    </div>
  </section>
</template>

<script>
import BaseCard from "../common/BaseCard.vue";
export default {
  name: "PostSection",
  data() {
    return {
      posts: [],
    };
  },
  components: {
    BaseCard,
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

<style lang="scss" scoped>
.postSection {
  background-color: black;
  color: greenyellow;

  ul {
    list-style: none;
  }
}
</style>