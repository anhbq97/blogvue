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
import Posts from '../home/includes/Posts.vue'
import Footer from '../home/includes/Footer.vue'
import Menu from '../home/includes/Menu.vue'

export default {
    name: 'LayoutBlog',
    components: {
        Menu,
        Posts,
        Footer,
    }
}

    
</script>