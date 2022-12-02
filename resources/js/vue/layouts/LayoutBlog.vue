<template>
    <Menu />
    
    <router-view></router-view>

    <footer>
        <div class="container">
            <Footer />
        </div>
    </footer>
</template>

<script>
import Posts from '../home/includes/posts.vue'
import Footer from '../home/includes/footer.vue'
import Menu from '../home/includes/menu.vue'

export default {
    name: 'LayoutBlog',
    components: {
        Menu,
        Posts,
        Footer,
    }
}

    
</script>