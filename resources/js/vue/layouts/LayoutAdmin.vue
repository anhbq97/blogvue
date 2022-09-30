<template>
    <div class="admin">
        <div class="admin-nav-wrapper">
            <div class="header">
                <router-link to="/">CMS BLOG</router-link>
            </div>

            <div class="slice">
                <span></span>
            </div>

            <div class="body">
                <div class="title-module">
                    <p>Dashboard</p>
                </div>

                <ul class="items"> 
                    <li class="item"><router-link to="/dashboard"><i class="fa-solid fa-house"></i> Dashboard</router-link></li>
                </ul>

                <div class="title-module">
                    <p>Posts</p>
                </div>

                <ul class="items">
                    <li class="item"><router-link to="/setting/blog"><i class="fa-solid fa-blog"></i> List</router-link></li>
                    <li class="item"><router-link to="/setting/profile"><i class="fa-solid fa-plus"></i> Create</router-link></li>
                </ul>

                <div class="title-module">
                    <p>Chat</p>
                </div>

                <ul class="items">
                    <li class="item"><router-link to="/setting/blog"><i class="fa-solid fa-message"></i> List</router-link></li>
                </ul>

                <div class="title-module">
                    <p>Notification</p>
                </div>

                <ul class="items">
                    <li class="item"><router-link to="/setting/blog"><i class="fa-solid fa-bell"></i> List</router-link></li>
                    <li class="item"><router-link to="/setting/profile"><i class="fa-solid fa-plus"></i> Create</router-link></li>
                </ul>

                <div class="title-module">
                    <p>Setting</p>
                </div>

                <ul class="items">
                    <li class="item"><router-link to="/setting/profile"><i class="fa-solid fa-user"></i> Profile</router-link></li>
                    <li class="item"><router-link to="/setting/blog"><i class="fa-solid fa-gear"></i> Blog</router-link></li>
                    <li class="item">
                        <div class="logout">
                            <p class="btn btn-danger" @click.prevent="logout()">Logout</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- <div class="footer">
                <p>Designer and Development By BuiQuocAnh</p>
            </div> -->
        </div>

        <div class="admin-content-wrapper">
            <div class="wrapper-top">
                <ul>
                    <li><i class="fa-solid fa-circle-left"></i></li>
                    <li><i class="fa-solid fa-circle-right"></i></li>
                </ul>
                <div class="profile">
                    <p>{{ user_name }}</p>
                </div>
            </div>
            <router-view></router-view>
        </div>
    </div>
    

</template>

<script>
    export default {
        name: 'LayoutAdmin',
        data: function () {
            return {
                user_name: null,
                user_email: null,
            }
        },
        created() {
            let user = JSON.parse(localStorage.getItem('USER'));
            
            this.user_name = user.name;
            this.user_email = user.email;
        },
        methods: {
            logout() {
                axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('TOKEN')}` 
                axios.post(process.env.MIX_APP_URL_LOCAL + '/api/v1/auth/logout', {
                })
                .then((response) => {
                    if (response.data.code == 200) {
                        localStorage.clear();
                        this.$router.push('/');
                    }
                });
            },
        }
    }

    
</script>