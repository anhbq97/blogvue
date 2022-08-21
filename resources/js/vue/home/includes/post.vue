<template>

        <div class="card box-post">
            <router-link :to="{name: 'ReadPost', params: {id: post.post_id}}">
                <img class="card-img-top" width="360" height="360" :src="'http://blogvue.local/storage/images/' + post.image" alt="">
            </router-link>
            <div class="card-body">
                <div class="card-info">
                    <small class="card-tag">{{ post.title }}
                        - 
                    {{ post.created_at }}</small>
                    <small class="card-author"><i class="fa-solid fa-user"></i>{{ post.user_name }}</small>
                    <div class="clearfix"></div>
                </div>
                <p class="card-title"><a href="">{{ post.title }}</a></p>
                <p class="card-summary">{{ post.summary }}</p>
                <p class="card-readmore"><a href="">Đọc tiếp <i class="fa-solid fa-angles-right"></i></a></p>
            </div>
        </div>
</template>
<script>
    export default {
        props: ['post'],
        // methods: {
        //     getPost(post_id) {
        //         axios.get('api/posts?page=' + page).then(response => {
        //             this.posts = response.data.data.data,
        //             this.pagination = response.data.pagination
        //             this.isActived();
        //             this.pagesNumber();
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         })
        //     }
        // }
    }
</script>