<template>
  <div class="container">
    <h1>Categories</h1>
    <ul v-if="categories.length > 0">
      <li v-for="category in categories" :key="category.id">
        {{ category.name }}
      </li>
    </ul>
    <h2 v-else>No Categories Available</h2>
  </div>
</template>

<script>
export default {
  name: "Categories",
  data() {
    return {
      categories: [],
    };
  },
  created() {
    axios
      .get("/api/categories")
      .then((response) => {
        this.categories = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>