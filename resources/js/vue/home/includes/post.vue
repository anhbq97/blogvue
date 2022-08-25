<template>
        <div class="card box-post">
            <router-link :to="{name: 'ReadPost', params: {id: post.post_id}}">
                <img class="card-img-top" width="360" height="360" v-lazy="'/storage/images/' + post.image" alt="">
            </router-link>
            <div class="card-body">
                <div class="card-info">
                    <small>Ngày tạo: {{ post.created_at }}</small>
                    <small class="card-author"><i class="fa-solid fa-user"></i>{{ post.user_name }}</small>
                    <div class="clearfix"></div>
                </div>
                <p class="card-title">
                    <router-link :to="{name: 'ReadPost', params: {id: post.post_id}}" class="card-tag">
                        {{ post.title }}
                    </router-link></p>
                <p class="card-summary">{{ post.summary }}</p>
                <p class="card-readmore">
                    <router-link :to="{name: 'ReadPost', params: {id: post.post_id}}">Đọc tiếp <i class="fa-solid fa-angles-right"></i></router-link>
                </p>
            </div>
        </div>
</template>
<script>
    export default {
        props: ['post'],
    }
</script>