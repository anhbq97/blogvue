<template>
<main class="container px-xs-0" id="main-body-content">
    <div class="row px-xs-0">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <nav style="--bs-breadcrumb-divider: '>';background-color: #8080803b;border-radius: 3px;padding: 0px 3px 0px 8px;" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
                </ol>
            </nav>

            <div class="label-detail-post mb-4">
                <div class="label-detail-post-author">
                    <a href="#" class="">{{ post.user_name ?? 'NONE' }}</a>
                    <span class="fa-regular fa-clock"> <small>{{ post.created_at ?? 'NONE' }}</small></span>
                </div>
                <div class="label-detail-post-command">
                    <button class="btn btn-primary btn-sm"><i class="fa-regular fa-thumbs-up"></i> 0</button>
                    <button class="btn btn-warning btn-sm"><i class="fa-regular fa-thumbs-down"></i> 0</button>
                    <button class="btn btn-secondary btn-sm"><i class="fa-regular fa-comment"></i> 0</button>
                </div>
            </div>
            <h2>{{ post.title }}</h2>
            <p>{{ post.summary }}</p>
            <div class="post-content" v-html="post.content">
            </div>
            
            <p>Xem thêm:
                
            </p>
        </div>
    </div>
</main>
    
</template>
<script>
    export default {
        data: function () {
            return {
                post: [],
            }
        },
        created() {
            this.getPost(this.$route.params.id);
        },
        methods: {
            getPost(id) {
                axios.get('/api/post/' + id).then(response => {
                    this.post = response.data.data
                })
                .catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>
<script>
</script>