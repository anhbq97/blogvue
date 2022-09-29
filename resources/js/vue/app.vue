<template>
    <!-- <notifications /> -->
    <LayoutBlog v-if="this.$route.meta.layout == 'LayoutBlog'"></LayoutBlog>
    <LayoutAdmin v-else></LayoutAdmin>
</template>
<script>
import LayoutBlog from '../vue/layouts/LayoutBlog.vue'
import LayoutAdmin from '../vue/layouts/LayoutAdmin.vue'
import blog from '../src/blog.js';
blog.navbar();

export default {
    components: {
        LayoutBlog,
        LayoutAdmin,
    }
}
</script>
