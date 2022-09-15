<script setup>
    import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
    import {
        Link
    } from '@inertiajs/inertia-vue3';

</script>

<template>
    <!-- <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" :href="route('welcome')">
                <img src="/assets/images/voting-box 1.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('welcome')">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('aspire')"> Aspirants Form </Link>
                    </li>
                    <li class="nav-item dropdown">
                        <Link class="nav-link" :href="route('presidential')" > Presidential Candidates </Link>
                    </li>

                    <li class="nav-item dropdown">
                        <Link class="nav-link" :href="route('guber')" > Gubernitorial Candidates </Link>
                    </li>
                </ul>
            </div>
            <div class="btn-groups" v-if="!$page.props.auth.user">
                <Link :href="route('login')" class="btn login">Login</Link>
                <Link :href="route('register')" class="btn login">Register</Link>
            </div>
            <div class="btn-groups" v-else>
                <a class="btn login" :href="route('home')" > Dashboard </a>
            </div>
        </div>
    </nav> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="/assets/images/logo.jpeg" alt="" class="" style="width: 40px;" >
        </a>
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
            data-target="#navb" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navb" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <Link class="nav-link" :href="route('welcome')">Home</Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link" :href="route('aspire')"> Aspirants Form </Link>
                </li>
                <li class="nav-item dropdown">
                    <Link class="nav-link" :href="route('presidential')"> Presidential Candidates </Link>
                </li>

                <li class="nav-item dropdown">
                    <Link class="nav-link" :href="route('guber')"> Gubernitorial Candidates </Link>
                </li>
            </ul>
            <div>
                <ul class="navbar-nav" v-if="!$page.props.auth.user">
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('login')">Login</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('register')"> Register </Link>
                    </li>
                </ul>
                <ul class="navbar-nav" v-else>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('home')">Dashboard</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <slot />

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2 footer-tag">
                    <h5>Voting</h5>
                    <a href="#">
                        <p>How it works</p>
                    </a>
                    <a href="#">
                        <p>Featured</p>
                    </a>
                    <a href="#">
                        <p>Support Center</p>
                    </a>
                </div>
                <div class="col-md-3 footer-tag">
                    <h5>Legal</h5>
                    <a href="#">
                        <p>Terms </p>
                    </a>
                    <a href="#">
                        <p>Privacy</p>
                    </a>
                    <a href="#">
                        <p>Security</p>
                    </a>
                </div>
                <div class="col-md-3 footer-tag">
                    <h5>Voting</h5>
                    <a href="#">
                        <p>How it works</p>
                    </a>
                    <a href="#">
                        <p>Featured</p>
                    </a>
                    <a href="#">
                        <p>Support Center</p>
                    </a>
                </div>
                <div class="col-md-2 footer-tag">
                    <h5>Voting</h5>
                    <a href="#">
                        <p>How it works</p>
                    </a>
                    <a href="#">
                        <p>Featured</p>
                    </a>
                    <a href="#">
                        <p>Support Center</p>
                    </a>
                </div>
                <div class="col-md-2 footer-tag">
                    <h5>Follow Us</h5>
                    <div class="links">
                        <a href="#" class="text-white"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
