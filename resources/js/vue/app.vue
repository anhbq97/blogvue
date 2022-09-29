<template>
    <!-- <notifications /> -->
    <LayoutBlog v-if="this.$route.meta.layout == 'LayoutBlog'"></LayoutBlog>
    <LayoutAdmin v-else-if="this.$route.meta.layout == 'LayoutAdmin'"></LayoutAdmin>
    <LayoutAuth v-else></LayoutAuth>
</template>
<script>
import LayoutBlog from '../vue/layouts/LayoutBlog.vue'
import LayoutAdmin from '../vue/layouts/LayoutAdmin.vue'
import LayoutAuth from '../vue/layouts/LayoutAuth.vue'
import blog from '../src/blog.js';
blog.navbar();

export default {
    components: {
        LayoutBlog,
        LayoutAdmin,
        LayoutAuth
    }
}
</script>
