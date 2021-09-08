<template>
   <div id="footer">   
       <div class="container">

            <div class="groups">
                <div class="group">
                    <div class="g-title"> REDES SOCIALES </div>
                    <div class="item"> 
                        <a href="https://www.instagram.com/zerokills.esports/" target="_blank">
                            Instagram 
                        </a>
                        <a href="https://twitter.com/zk_zerokills" target="_blank">
                            Twitter 
                        </a>
                        <a href="https://www.youtube.com/channel/UCRxZjD5iMftgPgok3RnDg1Q" target="_blank">
                            Youtube 
                        </a>
                        <a href="https://discord.gg/jFknQMbMDB" target="_blank">
                            Discord 
                        </a>
                    </div>
                </div>

                <img src="/img/zklogo.png" class="logo">

                <div class="group">
                    <div class="g-title"> ZEROKILLS ESPORTS </div>
                    <div class="item"> 
                        <a href="/noticias">
                            Noticias 
                        </a>
                        <a href="/media">
                            Media 
                        </a>
                        <a href="/calendario">
                            Calendario 
                        </a>
                        <a href="/jugadores">
                            Jugadores 
                        </a>
                    </div>
                </div>
            </div>

            <div class="rights">
                <div>
                    © 2021, EU - Zero Kills Esports. All Rights Reserved.
                </div>
                <div>
                    Web design by <b> Scripted </b>
                </div>
            </div>
       </div>
   </div>
</template>

<script>
    export default {
        data() {
            return {
             
            }
        },
        methods: {

        },
    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    #footer {
        position: relative;
        width: 100%;
        height: 400px;
        margin-top: -5px;
        background-color: rgb(8, 8, 8);

        @include tablet {
            height: 310px;
        }

        &.container {
            display: flex;
        }

        .groups {
            display: flex;
            justify-content: space-evenly;
            

            .logo {
                display: none;
                margin-top: 70px;
                width: 100px;
                height: 100px;

                @include tablet {
                    display: block;
                }
            }

            .group {
                margin-left: 50px;
                padding-top: 50px;
                font-size: 18px;

                .g-title {
                    font-family: Valorant, Montserrat;
                }

                .item a{
                    display: block;
                    color: lightgray;
                    text-decoration: none;

                    &:hover {
                        color: white;
                    }
                }
            }

        }

        .rights {
            position: relative;
            display: block;
            margin-top: 50px;
            padding: 20px;
            color: lightgray;

            &::before {
                content: '';
                position: absolute;
                width: 90%;
                height: 1px;
                margin-top: -25px;
                background-color: lightgray;
            }

            @include tablet {
                display: flex;
                justify-content: space-between;

                &::before {
                    width: 100%;
                }
            }
        }

    }


</style>
