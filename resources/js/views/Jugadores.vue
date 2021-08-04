<template>
    <div id="Jugadores">
        <zk-menu></zk-menu>
        <div id="bg-logo"></div>
        <div class="title-section"> JUGADORES </div>
        <div class="container teams">
            <div class="team-block" v-for="(equipos, index) of jugadores" :key="index">

                <div class="title-section"> {{ equipos[0].team }} </div>
        
                <div class="container-players">
                    <div class="jugador" v-for="(jugador, index) of equipos" :key="index">
                        <div class="foto" :style="{ 'background-image': `url('${jugador.image}')`}"> </div>
                        <img :src="jugador.range" class="rango">
                        <div class="nombre"> {{ jugador.nickname }} </div>
                        <div class="titulo"> {{ jugador.subtitle }} </div>
                    </div>
                </div>
            </div>
        </div>
        <zk-footer></zk-footer>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    export default {
        data() {
            return {
                teams: [],
            }
        },
        methods: {
            ...mapActions(['loadJugadores']),
        },
        computed: {
            ...mapGetters(['jugadores'])
        },
        mounted() {
            if(this.jugadores.length == 0) this.loadJugadores();
        }
    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    #Jugadores {
        padding-top: 100px;

        .teams {
            min-height: 100vh;
        }

        .team-block {

            .title-section {
                font-family: Valorant;
                font-size: 30px;
                margin-top: 40px;
                text-align: center;
            }


            .container-players {
                display: grid;
                justify-items: center;
                grid-template-columns: 1fr;

                @include tablet {
                    grid-template-columns: repeat(2, 1fr);
                }

                @include large {
                    grid-template-columns: repeat(5, 1fr);
                }

                .jugador {
                    position: relative;
                    width: 200px;
                    margin: 20px;
                    padding: 20px;
                    background-color: lightgray;
                    color: black;
                    border-radius: 5px;
                    box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%), 0 2px 4px -1px rgb(0 0 0 / 30%);

                    .foto {
                        position: relative;
                        margin: auto;
                        width: 150px;
                        height: 150px;
                        border-radius: 5px;
                        background-size: cover;
                        background-position: center;
                        box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%), 0 2px 4px -1px rgb(0 0 0 / 30%);
                    }

                    .rango {
                        position: absolute;
                        left: 0;
                        right: 0;
                        margin: auto;
                        margin-top: -30px;
                        width: 50px;
                        height: 50px;
                    }
                    .nombre {
                        margin-top: 30px;
                        font-size: 23px;
                        font-weight: bold;
                        text-align: center;
                    }
                    .titulo {
                        text-align: center;
                    }
                }

            }
        }
 
    }

</style>
