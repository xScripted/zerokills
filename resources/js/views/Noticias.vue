<template>
    <div id="Noticia">
        <zk-menu></zk-menu>
        <div id="bg-logo" style="position: fixed"></div>

        <div class="container noticias">
            <div class="title-section"> NOTICIAS </div>
            <div class="noticia" v-for="(noticia, index) of noticias" :key="index">
                <div class="noticia-bg" :style="{ 'background-image': `url(${noticia.image})` }"></div>
                <h1> {{ noticia.title }}</h1>
                <div class="content" v-html="noticia.description"></div>
                <div class="noticia-footer">
                    {{ noticia.name }} <br>
                    {{ noticia.date }}
                </div>
            </div>
        </div>

        <zk-footer></zk-footer>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        data() {
            return {
                
            }
        },
        computed: {
            ...mapGetters(['noticias'])
        },
        methods: {

        },
        mounted() {
            var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
                console.log(window.location.hostname);
        }
    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    .title-section {
        margin-top: 100px;
    }

    .noticias {
        min-height: 100vh;
    }

</style>
