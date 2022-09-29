<template>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12 wrap-post" v-for="(post, index) in posts" :key="index" data-id="{{ post.post_id }}">
            <Post :post="post"></Post>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <ul class="pagination" style="justify-content: center">
                <li v-if="pagination.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous"
                        @click.prevent="changePage(pagination.current_page - 1)" class="page-link">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="(page, index) in pagesNumber()" :key="index" v-bind:class="[ page == isActived() ? 'active' : '']" class="page-item">
                    <a href="#" @click.prevent="changePage(page)" class="page-link">{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page" class="page-item">
                    <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)" class="page-link">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Post from './Post.vue';

    export default {
        name: 'Posts',
        props: {
            // this allows using the `value` prop for a different purpose
            value: String,
            // use `title` as the prop which take the place of `value`
            email: {
                type: String,
                default: 'bquocanh.97@gmail.com'
            }
        },
        data: function () {
            return {
                posts: [],
                pagination: [],
                offset: 4
            }
        },
        components: {
            Post,
        },
        created() {
            this.getListPost(1);
        },
        methods: {
            getListPost(page) {
                axios.get('api/posts?page=' + page).then(response => {
                    this.posts = response.data.data.data,
                    this.pagination = response.data.pagination
                    this.isActived();
                    this.pagesNumber();
                })
                .catch(error => {
                    console.log(error);
                })
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.getListPost(page);
            },
            isActived () {
                return this.pagination.current_page;
            },
            pagesNumber () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        }
    }
</script>