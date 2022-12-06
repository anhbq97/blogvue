<template>
    <div class="admin">
        <div class="admin-nav-wrapper">
            <div class="header">
                <img :src="avatarAdmin" alt="AdminLTE Logo" style="opacity: .8">
                <router-link to="/">CMS BLOG</router-link>
            </div>

            <div class="os-sidebar">
                <div class="body">
                    <div class="os-viewport" style="overflow-y: scroll;">
                        <div class="os-content">
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img :src="avatarAdmin2" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="#" class="d-block">Alexander Pierce</a>
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>Tổng quan <i class="right fas fa-angle-left"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview" style="display: none;">
                                            <li class="nav-item">
                                                <a href="./index.html" class="nav-link active">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v1</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index2.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v2</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/widgets.html" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Widgets<span class="right badge badge-info">2</span></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/dashboard" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Trang chủ<span class="right badge badge-danger">New</span></p>
                                        </router-link>
                                    </li>
                                    <li class="nav-header">Blog</li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Danh sách bài viết</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Thêm bài viết</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-header">Dịch vụ</li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Danh sách mã nguồn</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Email</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-header">Cài đặt</li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Phân quyền</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Vai trò</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Menu</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/setting/blog" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Cuối trang</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-header">Tài khoản</li>
                                    <li class="nav-item">
                                        <router-link to="/setting/profile" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Trang cá nhân</p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" @click.prevent="logout()" class="nav-link logout">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>Đăng xuất</p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
                avatarAdmin: 'http://poorclu.local/images/AdminLTELogo.png',
                avatarAdmin2: 'http://poorclu.local/images/user2-160x160.jpeg',
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

<style lang="scss" scoped>
.admin {
    display: flex;
    height: 100%!important;

    .admin-nav-wrapper {
        width: 250px;
        height: 100%;
        background-color: #343a40;
    
        .header {
            color: white;
            width: inherit;
            height: 57px;
            border-bottom: 1px solid #4b545c;
            display: block;
            font-size: 1.25rem;
            line-height: 1.5;
            padding: 0.8125rem 0.5rem;
            transition: width .3s ease-in-out;
            white-space: nowrap;
    
            img {
                float: left;
                line-height: .8;
                margin-left: 0.8rem;
                margin-right: 0.5rem;
                margin-top: -3px;
                max-height: 33px;
                width: auto;
                box-shadow: 0 10px 20px rgba(0,0,0,.19),0 6px 6px rgba(0,0,0,.23)!important;
                border-radius: 50%;
            }
            a {
                display: block;
                text-decoration: none;
                color: rgba(255,255,255,.8);
                // text-align: center;
                transition: margin-left .3s linear,opacity .3s ease,visibility .3s ease;
                font-weight: 300!important;
            }
        }
    
        .slice {
            width: inherit;
            height: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            
            span {
                width: 80%;
                height: 1px;
                background-color: white;
            }
        }
    
        .os-sidebar {
            width: inherit;
            height: calc(100vh - (3.5rem + 1px));
            overflow-x: hidden;
            overflow-y: initial;
            padding-bottom: 0;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            padding-top: 0;
            position: relative;
            .body {
                width: inherit;
                font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
                height: 100%;
                box-sizing: inherit;
                direction: inherit;
                position: absolute;
                overflow: visible;
                padding: 0;
                margin: 0;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                height: auto!important;
                z-index: 0;
                .os-viewport {
                    direction: inherit!important;
                    box-sizing: inherit!important;
                    resize: none!important;
                    outline: 0!important;
                    position: absolute;
                    overflow: hidden;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    padding: 0;
                    margin: 0;
                    .os-content {
                        padding: 0px 8px;
                        box-sizing: border-box!important;
                        position: relative;
                        display: block;
                        height: 100%;
                        width: 100%;
                        height: 100%;
                        width: 100%;
                        visibility: visible;
                        .user-panel {
                            border-bottom: 1px solid #4f5962;
                            .image {
                                display: inline-block;
                                padding-left: 0.8rem;
                                .elevation-2 {
                                    box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23)!important;
                                }
                                img {
                                    height: auto;
                                    width: 2.1rem;
                                }
                                .img-circle {
                                    border-radius: 50%;
                                }
                            }
                            .info {
                                display: inline-block;
                                padding: 5px 5px 5px 10px;
                                overflow: hidden;
                                white-space: nowrap;
                                a {
                                    color: #c2c7d0;
                                    display: block!important;
                                    text-decoration: none;
                                }
                            }
                        }
                        .form-control-sidebar {
                            background-color: #3f474e;
                            border: 1px solid #56606a;
                            color: #fff;
                        }
                        .input-group-append {
                            background-color: #3f474e;
                            border: 1px solid #56606a;
                            color: #fff;
                            .btn {
                                border-top-left-radius: 0;
                                border-bottom-left-radius: 0;
                                border-top-right-radius: 0.25rem;
                                border-bottom-right-radius: 0.25rem;
                            }
                            
                            .btn-sidebar {
                                background-color: #3f474e;
                                border: 1px solid #56606a;
                                color: #fff;
                            }
                        }
                        .nav-sidebar {
                            position: relative;
                            .nav-item {
                                padding: 0px 0px 0px 0px;
                                margin-bottom: 0;
                                height: 43px;
                                
                                .nav-icon {
                                    margin-left: 0.05rem;
                                    font-size: 1.2rem;
                                    margin-right: 0.2rem;
                                    text-align: center;
                                    width: 1.6rem;
                                }
                                .logout {
                                    background-color: rgba(255, 0, 0, 0.545);
                                }
                                .nav-link {
                                    position: relative;
                                    width: calc(250px - 0.5rem * 2);
                                    transition: width ease-in-out .3s;
                                    color: #c2c7d0;
                                    font-size: 14px;
                                    font-weight: 300;
                                    
                                    .nav-icon {
                                        margin-left: 0.05rem;
                                        font-size: 1.2rem;
                                        margin-right: 0.2rem;
                                        text-align: center;
                                        width: 1.6rem;      
                                    }
                                    p {
                                        display: inline;
                                        margin: 0;
                                        white-space: normal;
                                        .right {
                                            position: absolute;
                                            right: 1rem;
                                            top: 0.7rem;
                                        }
                                        .badge-danger {
                                            color: #fff;
                                            background-color: #dc3545;
                                        }
                                        .badge-info {
                                            color: #fff;
                                            background-color: #17a2b8;
                                        }
                                        .badge {
                                            display: inline-block;
                                            padding: 0.25em 0.4em;
                                            font-size: 75%;
                                            font-weight: 700;
                                            line-height: 1;
                                            text-align: center;
                                            white-space: nowrap;
                                            vertical-align: baseline;
                                            border-radius: 0.25rem;
                                            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                        }
                                    }
                                    
                                }
                                .nav-link:hover:not(.active){
                                    background-color: rgba(255, 255, 255, 0.126);
                                }
                            }
                            .nav-header {
                                font-size: .9rem;
                                padding: 0.5rem 0.75rem;
                                background-color: inherit;
                                color: #d0d4db;
                                overflow: hidden;
                                text-overflow: clip;
                                white-space: nowrap;
                            }
                        }
                    }
                }
            }
        }
        
    
        .footer {
            width: inherit;
            position: fixed;
            bottom: 0;

            p {
                text-align: center;
                color: white;
            }
        }
    }

    .admin-content-wrapper {
        width: 100%;
        height: 100%;
        padding: 5px 24px 5px 24px;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        color: white;

        .wrapper-top {
            display: flex;
            justify-content: flex-start;
            flex-direction: row;
            padding: 24px 24px 20px 5px;
            color: white;

            ul {
                list-style: none;
                display: flex;
                padding-left: 0px;
    
                li {
                    cursor: pointer;
                    margin-right: 10px;
    
                    i {
                        font-size: 29px;
                    }
                }
            }

            .profile {
                margin-left: auto;
            }
        }
        
    }
    .fa, .fas {
        font-weight: 900;
    }
}

</style>