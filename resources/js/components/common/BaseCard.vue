<template>
  <div class="card">
    <h3>{{ title }}</h3>
    <div class="card-content">
      {{ content }}
    </div>
    <router-link :to="{ name: 'single-post', params: { slug: slug } }"
      >Show More</router-link
    >
  </div>
</template>

<script>
export default {
  name: "BaseCard",
  props: {
    title: {
      type: String,
    },
    content: {
      type: String,
    },
    slug: {
      type: String,
    },
  },
};
</script>

<style lang="scss" scoped>
.card {
  background-color: black;
  padding: 0.625rem;
}
</style>