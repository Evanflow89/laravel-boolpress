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
    <div class="mt-3" v-if="post.comments.length > 0">
      <h4>Comments</h4>
      <ul>
        <li v-for="comment in post.comments" :key="comment.id">
          <h5>{{ comment.name }}</h5>
          <div>{{ comment.content }}</div>
        </li>
      </ul>
    </div>
    <div class="mb-2">
      <h3>Leave a Comment</h3>
      <form @submit.prevent="addComment()">
        <div class="mb-1">
          <input
            type="text"
            name="name"
            placeholder="Insert your name"
            v-model="formData.name"
          />
          <ul v-if="errors.name">
            <li v-for="(err, index) in errors.name" :key="index">{{ err }}</li>
          </ul>
        </div>
        <div class="mb-1">
          <textarea
            name="content"
            id="content"
            cols="30"
            rows="10"
            placeholder="Insert your Comment Here!"
            v-model="formData.content"
          ></textarea>
          <ul v-if="errors.content">
            <li v-for="(err, index) in errors.content" :key="index">
              {{ err }}
            </li>
          </ul>
        </div>
        <div class="mb-1">
          <button type="submit">Add Comment</button>
        </div>
        <div
          v-if="commentSent"
          class="mt-3"
          style="color: green; border: 1px solid green"
        >
          Your Comment is Under Approvation
        </div>
      </form>
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
      formData: {
        name: "",
        content: "",
      },
      commentSent: false,
      errors: {},
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
  methods: {
    addComment() {
      axios
        .post(`/api/comments/${this.post.id}`, this.formData)
        .then((response) => {
          // console.log(response.data.data);
          this.commentSent = true;
          this.formData.name = "";
          this.formData.content = "";
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style>
</style>