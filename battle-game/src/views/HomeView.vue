<template>
  <div class="home">
    <h1>Welcome to the Game</h1>
    <nav>
      <router-link to="/hero">Hero</router-link> |
      <router-link to="/monster">Monster</router-link> |
      <router-link to="/battle-field">Battle Field</router-link>
    </nav>
    <p>Select a page to start playing!</p>
  </div>
</template>

<script setup>
// poți adăuga logică aici, dacă e nevoie
</script>

<style scoped>
.home {
  text-align: center;
  margin-top: 2rem;
}

nav a {
  margin: 0 1rem;
  text-decoration: none;
  color: #42b983;
}

nav a.router-link-exact-active {
  font-weight: bold;
  color: #35495e;
}
</style>
