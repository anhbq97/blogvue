<template>
    <div>
        <p>Home</p>
    </div>
    <div class="site-wrapper">
        <div class="header-wrap">
            <div class="container">
                <Menu></Menu>
            </div>
        </div>

        <main class="container px-xs-0" id="main-body-content">
            <div class="row px-xs-0">
                <div class="col-md-12">
                    <Posts></Posts>
                </div>
            </div>
        </main>

        <footer>
            <div class="container">
                <Footer></Footer>
            </div>
        </footer>
    </div>
</template>

<script>
    import Menu from '../home/includes/menu.vue';
    import Posts from '../home/includes/posts.vue';
    import Footer from '../home/includes/footer.vue';
    
    export default {
        components: {
            Menu,
            Posts,
            Footer
        }
    }
</script>