<template>
  <a href="#/">Home</a> |
  <a href="#/about">About</a> |
  <a href="#/login">Login</a> |
  <a href="#/register">Register</a> |
  <component :is="currentView" />
</template>

<script>
import Login from '../auth/login.vue'
import About from '../pages/about.vue'
import Register from '../auth/register.vue'
import Home from '../home/index.vue'
import NotFound from '../pages/notFound.vue'

const routes = {
  '/': Home,
  '/about': About,
  '/login': Login,
  '/register': Register
}

export default {
  data() {
    return {
      currentPath: window.location.hash
    }
  },
  computed: {
    currentView() {
      return routes[this.currentPath.slice(1) || '/'] || NotFound
    }
  },
  mounted() {
    window.addEventListener('hashchange', () => {
		  this.currentPath = window.location.hash
		})
  }
}
</script>