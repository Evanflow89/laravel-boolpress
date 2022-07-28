<template>
  <main>
    <router-view></router-view>
  </main>
</template>

<script>
import PostSection from "../Sections/PostSection.vue";
export default {
  name: "BaseMain",
  components: {
    PostSection,
  },
};
</script>

<style>
</style>