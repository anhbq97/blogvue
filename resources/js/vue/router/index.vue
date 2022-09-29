<script>
import Login from '../auth/Login.vue'
import About from '../home/About.vue'
import Register from '../auth/Register.vue'
import Home from '../home/Index.vue'
import NotFound from '../pages/NotFound.vue'
import ReadPost from '../home/includes/ReadPost.vue'
import Dashboard from '../admin/dashboard/Index.vue'
import SettingProfile from '../admin/setting/Profile.vue'
import SettingBlog from '../admin/setting/Blog.vue'
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  // BLOG
  { path: '/', component: Home, meta: { layout: 'LayoutBlog' },},
  { path: '/about', component: About, meta: { layout: 'LayoutBlog' },},
  { path: '/login', component: Login, meta: { layout: 'LayoutAuth' }, },
  { path: '/register', component: Register, meta: { layout: 'layoutAuth' }, },
  { path: '/post/:id', name: 'ReadPost', component: ReadPost, meta: { layout: 'LayoutBlog' }, },

  // ERROR
  { path: '/:pathMatch(.*)*', component: NotFound, meta: { layout: 'layoutAuth' },},

  // ADMIN
  { 
    path: '/dashboard', 
    component: Dashboard, 
    meta: { layout: 'LayoutAdmin' }, 
  },
  {
    path: '/setting',
    meta: { layout: 'LayoutAdmin' }, 
    children: [
      {
        path: '/setting/profile',
        component: SettingProfile,
        meta: { layout: 'LayoutAdmin' }, 
      },
      {
        path: '/setting/blog',
        component: SettingBlog,
        meta: { layout: 'LayoutAdmin' }, 
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
</script>