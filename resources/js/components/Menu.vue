<template>
    <div>
        <div id="banner" v-if="typeof(theBanner) === 'object'">
            <div class="container" style="overflow: hidden">
                <div class="text">
                    {{ this.theBanner.text }}
                </div>
            </div>
        </div>
        <div id="menu" :class=" { 'menu-opened': menuClass, 'black-style': scrollClass} ">      
            <div class="hamburger" :class="{ 'menu-opened': menuClass } " @click="openMenu"></div>
            <router-link to="/">
                <img class="logo" src="/img/zklogo.png" alt="ZK">
            </router-link>
            <div id="menu-items">
                <router-link to="/noticias"> <div class="menu-item"> NOTICIAS </div> </router-link>
                <router-link to="/calendario"> <div class="menu-item"> CALENDARIO </div> </router-link>
                <router-link to="/jugadores"> <div class="menu-item"> JUGADORES </div> </router-link>
                <router-link to="/clips"> <div class="menu-item"> CLIPS </div> </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    export default {
        data() {
            return {
                menuClass: false,
                scrollClass: false,
                theBanner: {}
            }
        },
        methods: {
            ...mapActions(['loadBanners']),
            openMenu() {
                this.menuClass = this.menuClass === false ? true : false;
            },
            handleScroll() {
                this.scrollClass = window.scrollY <= 20 || window.innerWidth < 765 ? false : true;
            }
        },
        computed: {
            ...mapGetters(['banners'])
        },
        async mounted() {
            if(this.banners.length == 0) await this.loadBanners();

            this.theBanner = this.banners.find( banner => banner.active === 'on');

            if(typeof(this.theBanner) === 'object') {
                var menu = document.querySelector('#menu');
                var banner = document.querySelector('#banner');
                document.body.style.marginTop = '50px';
                menu.style.marginTop = '50px';
                banner.style.display = 'block';
            }

            window.addEventListener('scroll', () => this.handleScroll());

        }
    }
</script>

<style lang="scss">
    @import '../../sass/media-queries';

    #banner {
        position: fixed;
        top: 0;
        width: 100%;
        height: 50px;
        background-color: rgb(255,0,198);
        z-index: 10;
        overflow: hidden;
        display: none;

        .text {
            width: fit-content;
            font-weight: bold;
            margin-top: 7px;
            font-size: 20px;
            animation-name: banner;
            animation-duration: 15s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }
    }

    #menu {
        position: fixed;
        width: 100%;
        height: 60px;
        color: white;
        top: 0;
        box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%), 0 2px 4px -1px rgb(0 0 0 / 30%);
        overflow: hidden;
        z-index: 100;

        background: rgb(255,0,198);
        background: linear-gradient(-110deg, rgba(255,0,198,1) 0%, rgba(9,9,121,1) 100%);

        .hamburger {
            transition: .3s ease;
            position: absolute;
            background-color: white;
            width: 30px;
            height: 3px;
            border-radius: 20%;
            margin: 18px;

            &::after, &::before {
                transition: .3s ease;
                display: block;
                content: '';
                background-color: white;
                width: 30px;
                height: 3px;
                border-radius: 20%;
            }

            &::before { margin-top: 10px; }
            &::after { margin-top: 7px; }


            &.menu-opened {
                transition: .3s ease;
                transform: rotateZ(45deg) translate(10px, 10px);
                
                
                &::before { 

                    opacity: 0;
                }


                &::after { 
                    transform: rotateZ(90deg) translateY(0px) translateX(-20px);
                }

            }
        }

        &.black-style {
            transition: 0.5s ease;
            background: black !important; 
            background: linear-gradient(0deg, rgba(0, 0, 0, 0) 0%,rgba(0, 0, 0, 0) 100%);
        }
        
        &.menu-opened {
            transition: .3s ease;
            height: 100vh;
        }

        .logo {
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            margin-top: 5px;
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

        #menu-items {
            position: relative;
            margin-top: 100px;
            margin-left: 70px;
            font-size: 25px;
            font-weight: bold;

            a {
                text-decoration: none;
                color: inherit;
            }

            .menu-item {
                transition: .3s;
                padding: 25px 0px;
                text-shadow: 0px 0px 2px black;
                cursor: pointer;
                color: lightgray;

                &:hover {
                    transition: .3s;
                    color: white;
                    text-shadow: 5px 5px 5px black;
                }

                &.menu-active {
                    text-shadow: 5px 5px 5px black;
                }
            }
        }

        .router-link-active div {
            color: rgb(255,0,198) !important;
        }

        @include tablet {  
            transition: 0.5s ease;          
            box-shadow: none;
            background: rgb(9,9,121);
            background: linear-gradient(0deg, rgba(9,9,121,0) 0%, rgba(0,0,0,0.4766281512605042) 100%);

            .hamburger {
                display: none;
            }

            #menu-items {
                display: flex;
                margin-top: 5px;
                margin-left: 100px;

                .menu-item {
                    padding: 10px 25px;
                    font-size: 17px;
                }
            }

            .logo {
                left: 30px;
                top: 5px;
                margin: 0px;
            }
        }
    }

    @keyframes banner {
        from {
            transform: translateX(300%);
        }
        to {
            transform: translateX(-100%);
        }
    }


</style>
