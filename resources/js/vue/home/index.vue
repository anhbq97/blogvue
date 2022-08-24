<template>
    <Menu />
    <main class="container px-xs-0" id="main-body-content">
        <div class="row px-xs-0">
            <div class="col-md-12">
                <Posts />
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <Footer />
        </div>
    </footer>
</template>

<script>
    import Posts from '../home/includes/posts.vue';
    import Footer from '../home/includes/footer.vue';
    import Menu from '../home/includes/menu.vue';
    
    export default {
        components: {
            Posts,
            Footer,
            Menu
        }
    }
</script>