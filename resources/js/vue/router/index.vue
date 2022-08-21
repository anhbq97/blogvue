<script>
import Login from '../auth/login.vue'
import About from '../pages/about.vue'
import Register from '../auth/register.vue'
import Home from '../home/index.vue'
import NotFound from '../pages/notFound.vue'
import ReadPost from '../home/includes/readPost.vue'
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/post/:id', name: 'ReadPost', component: ReadPost },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
// const routes = {
//   '/': Home,
//   '/about': About,
//   '/login': Login,
//   '/register': Register,
//   '/post/:id?': ReadPost
// }

// export default {
  // data() {
  //   return {
  //     currentPath: window.location.hash
  //   }
  // },
  // computed: {
  //   currentView() {
  //     return routes[this.currentPath.slice(1) || '/'] || NotFound
  //   }
  // },
  // mounted() {
  //   window.addEventListener('hashchange', () => {
	// 	  this.currentPath = window.location.hash
	// 	})
  // }
// }
</script>