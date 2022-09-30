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
  { path: '/', component: Home, meta: { layout: 'LayoutBlog', requiresAuth: false }, name: 'Home'},
  { path: '/about', component: About, meta: { layout: 'LayoutBlog', requiresAuth: false }, name: 'About'},
  { path: '/login', component: Login, meta: { layout: 'LayoutAuth', requiresAuth: false }, name: 'Login'},
  { path: '/register', component: Register, meta: { layout: 'layoutAuth', requiresAuth: false}, name: 'Register'},
  { path: '/post/:id', component: ReadPost, meta: { layout: 'LayoutBlog', requiresAuth: false }, name: 'ReadPost'},

  // ERROR
  { path: '/:pathMatch(.*)*', component: NotFound, meta: { layout: 'layoutAuth', requiresAuth: false},},

  // ADMIN
  { 
    path: '/dashboard', 
    component: Dashboard, 
    meta: { 
      layout: 'LayoutAdmin', 
      requiresAuth: true,
    }, 
    name: 'Dashboard'
  },
  {
    path: '/setting',
    meta: { 
      layout: 'LayoutAdmin', 
      requiresAuth: true,
    }, 
    children: [
      {
        path: '/setting/profile',
        component: SettingProfile,
        meta: { layout: 'LayoutAdmin', requiresAuth: true,}, 
        name: 'SettingProfile'
      },
      {
        path: '/setting/blog',
        component: SettingBlog,
        meta: { layout: 'LayoutAdmin', requiresAuth: true, }, 
        name: 'SettingBlog'
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

const auth = {
  isLoggedIn: () => {
    if (localStorage.getItem('isLogged')) { return true; }
    return false;
  }
};

router.beforeEach((to, from, next) => {
  console.log(to.name);
  if (to.meta.requiresAuth && !auth.isLoggedIn()) {
    next({ name: 'Login' });
  } else if (auth.isLoggedIn() && (to.name == 'Login' || to.name == 'Register')) {
    next({ name: 'Dashboard'});
  } else next();
});

export default router
</script>