<template>
    <main class="container px-xs-0" id="main-body-content">
        <div class="row px-xs-0">
            <div class="col-md-12">
                <Posts />
            </div>
        </div>
    </main>
</template>

<script>
    import Posts from './includes/posts.vue'
    
    export default {
        components: {
            Posts,
        }
    }
</script>