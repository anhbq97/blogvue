<template>
    <div class="site-wrapper">
        <div class="header-wrap">
            <div class="container">
            <div class="row">
                <header class="header-default">
                <nav class="navbar-menu">
                    <!-- logo  -->
                    <div class="navbar-logo">
                        <!-- <a href="#/" class="navbar-brand d-lg-inline-block d-md-inline-block">
                            <small>PoorCLU</small><i class="fa-solid fa-c" style="font-size: 15px;"></i><i class="fa-solid fa-l" style="font-size: 15px;"></i><i class="fa-solid fa-u" style="font-size: 15px;"></i>
                        </a> -->
                        <router-link to="/" class="navbar-brand d-lg-inline-block d-md-inline-block">
                            <small>PoorCLU</small>
                        </router-link>
                        <small>- WRITE MY LIFE</small>
                    </div>

                    <button type="button" class="icon-bar-mobile"><span class="fa-solid fa-bars"></span></button>

                    <div class="navbar-list" id="navbar-menu">
                        <ul class="navbar-items">
                            <li class="nav-item">
                                <!-- <a href="#/about">Giới thiệu</a> -->
                                <router-link to="/about">Giới thiệu</router-link>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)">Review <i class="fa-solid fa-angle-right" id="icon-menu"></i></a>
                                <ul class="sub-items">
                                    <li><a href="javascript:void(0)">Trò chơi</a></li>
                                    <li><a href="javascript:void(0)">Phim</a></li>
                                    <li><a href="javascript:void(0)">Sách</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)">Tools & Tips <i class="fa-solid fa-angle-right" id="icon-menu"></i></a>
                                <ul class="sub-items">
                                    <li><a href="javascript:void(0)">Excel</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                </header>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>