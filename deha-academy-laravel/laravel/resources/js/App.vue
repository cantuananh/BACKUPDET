<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <a href="http://localhost"><img width="200" height="54" src="https://i.ibb.co/mD0r8WK/Webp-net-resizeimage.png"></a><br>
            <span class="text-secondary">Laravel & Vue : Manager Intern</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/users" class="nav-item nav-link">User</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {}
</script>