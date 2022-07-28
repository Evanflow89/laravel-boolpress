<template>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1>Boolpress</h1>
        </div>
        <div class="col-6 text-right">
          <nav>
            <ul>
              <li><router-link :to="{ name: 'home' }">Home</router-link></li>
              <li>
                <router-link :to="{ name: 'about' }">About Us</router-link>
              </li>
              <li><a href="/admin/home">BackOffice</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "BaseHeader",
};
</script>

<style lang="scss" scoped>
ul {
  list-style: none;
}
</style>