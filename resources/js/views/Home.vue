<template>
    <div id="Home">
        <zk-menu></zk-menu>
        <div id="cinematic">
            <video autoplay muted loop id="myVideo">
                <source src="video/cinematica.mp4" type="video/mp4">
            </video>
        </div>
        <div class="impact-text">
            <h1>ZEROKILLS <br> <span> E-SPORTS </span> </h1>
            <div class="subtitle"> #wearezk</div>
        </div>


        <div id="aboutus">
            
            <div id="bg-logo"></div>
            <div class="title-section"> Quienes somos </div>

            <div class="container texto">
                Fundado el 3 de Marzo del 2021, <br>Zero Kills es un equipo de Valorant creado a partir de un grupo
                de amigos <br>que busca disfrutar de la competición a través del trabajo y la mejora constante. <br><br>

                Nos gusta la tensión de un buen torneo, <br> emocionarnos cuando las cosas salen bien y aprender de nuestros 
                errores.
            </div>
             
            <img class="about-logo" src="/img/zklogo.png">
        </div>

        <div id="noticias">
            <div class="container">
                <div class="title-section"> NOTICIAS </div>
                <div class="noticias-grid"> 
                    <div v-for="noticia of this.noticias6" :key="noticia.id">
                        <router-link :to="`/noticia/${noticia.id}/${noticia.title}`">
                            <div class="noticia" 
                                :style="{ 'background-image': `url(${ noticia.image })`}">
                                <div class="noticia-title"> {{ noticia.title }} </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <div id="calendario">
            <div class="container">
                <div class="title-section"> CALENDARIO </div>

                <div class="match" v-for="(evento, index) of calendario6" :key="index">
                    <div class="match-banner">
                        <div class="m-date"> {{ evento.date}} </div>
                        <div class="m-title"  v-if="evento.type == 'partido'" > {{ evento.title }} </div>
                    </div>
                    <div class="match-body">
                        <div class="m-time"> {{ evento.hour }} </div>
                        <div class="m-results" v-if="evento.type == 'partido'">
                            <img :src="evento.t1logo"/>
                            <div class="m-result"> {{ evento.t1score }} - {{ evento.t2score}} </div>
                            <img :src="evento.t2logo"/>
                        </div>

                        <div class="m-results" v-if="evento.type == 'titular'">
                            <div class="m-titular"> {{ evento.title }} </div>
                        </div>

                        <a :href="evento.stream">
                            <button class="m-watch"> <span> Stream </span> </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div id="media">
            <div id="bg-logo"></div>
            <div class="container">

                <div class="title-section"> CLIPS </div>
                                
                <splide :slides="media6" :options="options">
                    <splide-slide v-for="media in media6" :key="media.id">
                        <video class="video-slide" controls>
                            <source :src="media.url" type="video/mp4">
                        </video>
                        <div class="video-text">
                            {{ media.text }}
                        </div>
                    </splide-slide>
                </splide>
                
            </div>
        </div>

        <zk-footer></zk-footer>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    import { Splide, SplideSlide } from '@splidejs/vue-splide';
    import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

    export default {
        data() {
            return {
                app_url: process.env.MIX_APP_URL,
                options: {
                    type   : 'loop',
			    },
            }
        },
        components: {
            Splide,
            SplideSlide,
        },
        computed: {
            ...mapGetters(['noticias6', 'calendario6', 'media6'])
        },
        methods: {
            ...mapActions(['loadNoticias', 'loadCalendario', 'loadMedia']),
        },
        async mounted() {
            if(this.noticias6.length == 0) await this.loadNoticias();
            if(this.calendario6.length == 0) await this.loadCalendario();
            if(this.media6.length == 0) await this.loadMedia();

            var svgs = document.querySelectorAll('.splide__arrows svg path');

            for(let svg of svgs) svg.setAttribute('fill', '#c801ff');

        }

    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    #Home {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100vh;
    }

    #cinematic {

        video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            opacity: 0.5;
        }

    }
    
    .impact-text {

        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        padding-top: 40vh;

        h1 {
            color: white;
            font-size: 60px;
            text-align: center;
            font-family: 'Valorant';
            text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
        }

        .subtitle {
            text-align: center;
            font-size: 40px;
            margin-top: 50px;
            text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
            color: lightgray;
            display: none;
        }

        span {
            position: absolute;
            font-size: 40px;
            margin-left: -153px;
            margin-top: -10px;
            color: lightgray;
        }


        @include tablet {
            padding-top: 30vh;

            h1 {
                font-size: 120px;
            }

            span {
                position: absolute;
                font-size: 70px;
                margin-left: -305px;
                margin-top: -30px;
                color: lightgray;
            }
        }
    }

    #aboutus{
        position: relative;
        margin-top: 85vh;
        padding-top: 20vh;
        padding-bottom: 20vh;
        width: 100%;
        height: fit-content;
        background-color: rgb(12, 12, 12);
        clip-path: polygon(0 2%, 100% 0, 100% 100%, 0 98%);

        .texto {
            font-size: 18px;
            text-align: center;
            padding: 50px 0px;
        }

        .about-logo {
            position: relative;
            display: flex;
            justify-content: center;
            margin: auto;
            margin-top: 100px;
            width: 250px;
            height: 250px;
        }

        @include tablet {
            clip-path: polygon(0 8%, 100% 0, 100% 100%, 0 92%);
        }
    }

    #media {
        position: relative;
        width: 100%;
        margin-top: -5px;
        padding-bottom: 100px;
        background-color: rgb(12, 12, 12);

        .video-slide {
            width: 100%;
            height: fit-content;
            padding: 20px;
        }

        .video-text {
            font-size: 22px;
            padding: 20px;
            text-align: center;
        }

    }

    #noticias {
        position: relative;
        height: fit-content;
        padding-bottom: 20vh;

        .noticias-grid {
            display: grid;
            height: 1700px;
            grid-gap: 10px;
            grid-template-rows: repeat(6, 1fr);

            @include tablet {
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: repeat(12, 1fr);
                height: 800px;

                div:nth-child(1) { grid-row: 1 / 7; }
                div:nth-child(2) { grid-row: 1 / 6; }
                div:nth-child(3) { grid-row: 1 / 8; }
                div:nth-child(4) { grid-row: 7 / 12; }
                div:nth-child(5) { grid-row: 6 / 12; }
                div:nth-child(6) { grid-row: 8 / 12; }
            }
        }

        .noticia {
            transition: .3s ease;
            position: relative;
            width: 100%;
            height: 100%;
            border: 5px solid #dadada;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            cursor: pointer;

            &:after {
                content: '';
                position: absolute;
                top: 0;
                width: 100%;
                height: 100%;
            }

            &:hover {
                transition: .3s ease;
                filter: brightness(1.4);


                .noticia-title {
                    transition: .3s ease;
                    padding: 60px 10px;
                }
            }

            .noticia-title {
                transition: .3s ease;
                position: absolute;
                bottom: 0;
                width: 100%;
                color: white;
                font-size: 20px;
                padding: 30px 10px;
                text-align: center;
                background-color: rgba(0, 0, 0, 0.9);
                clip-path: polygon(51% 10%, 100% 19%, 100% 100%, 0 100%, 0 0);
            }
        }

        .noticia-hover {
            transition: .3s ease;
            filter: brightness(1.1);
        }

        .noticia-title-hover {
            transition: .3s ease;
            padding: 60px 10px !important;
        }
    }

    #calendario {
        position: relative;
        padding-top: 10vh;
        width: 100%;
        height: fit-content;
        background-color: rgb(12, 12, 12);
        clip-path: polygon(0 2%, 100% 0, 100% 100%, 0 98%);

        
        @include tablet {
            clip-path: polygon(0 100%, 100% 100%,  100% 0, 0 8%);
        }

    }

</style>
