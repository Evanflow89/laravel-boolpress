<template>
  <div class="container text-center">
    <h2>Page Not Found</h2>

    <p>
      <router-link :to="{ name: 'home' }">Back To Home</router-link>
    </p>
  </div>
</template>

<script>
export default {
  name: "Page404",
};
</script>

<style lang="scss" scoped>
.container {
  padding: 1.875rem;
}
</style>