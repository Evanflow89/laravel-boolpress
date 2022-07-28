<template>
  <div class="card">
    <h3>{{ title }}</h3>
    <div class="card-content">
      {{ content }}
    </div>
    <a href="#">Show More</a>
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
  },
};
</script>

<style lang="scss" scoped>
.card {
  background-color: black;
  padding: 0.625rem;
}
</style>