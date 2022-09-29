<template>
    <div class="nav-wrapper">
        <div class="nav-header">

        </div>

        <div class="nav-slice"></div>

        <div class="nav-body">
            <div class="nav-body-header-module">
                <p>Dashboard</p>
            </div>

            <ul class="navbar-items"> 
                <li class="nav-item"><router-link to="/dashboard">Dashboard</router-link></li>
            </ul>

            <div class="nav-body-header-module">
                <p>Setting</p>
            </div>

            <ul class="navbar-items">
                <li class="nav-item"><router-link to="/setting/profile">Profile</router-link></li>
                <li class="nav-item"><router-link to="/setting/blog">Blog</router-link></li>
            </ul>
        </div>

        <div class="nav-footer">

        </div>
    </div>
    <router-view></router-view>

</template>

<script>
    export default {
       name: 'LayoutAdmin'
    }

    
</script>