<script setup>
import { RouterView } from 'vue-router'
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/kratos.jpg" width="105" height="105" />
  </header>

  <main>
    <RouterView />
  </main>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
  text-align: center;
  padding: 1rem;
}

.logo {
  display: block;
  margin: 0 auto 1rem;
}

nav {
  font-size: 1rem;
  margin-top: 1rem;
}

nav a.router-link-exact-active {
  font-weight: bold;
  color: var(--color-text);
}

nav a {
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
  text-decoration: none;
  color: inherit;
}

nav a:first-of-type {
  border-left: none;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  nav {
    margin-top: 0;
  }
}
</style>
