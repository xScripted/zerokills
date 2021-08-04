<template>
    <div id="Noticia">
        <zk-menu></zk-menu>
        <div id="bg-logo" style="position: fixed"></div>
        <div class="noticia container">
            <div class="noticia-bg" :style="{ 'background-image': `url(${noticia.image})` }"></div>
            <h1> {{ noticia.title }}</h1>
            <div class="content" v-html="noticia.description"></div>
            <div class="noticia-footer">
                {{ noticia.name }} <br>
                {{ noticia.date }}
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
                noticia: {},
            }
        },
        computed: {
            ...mapGetters(['noticias'])
        },
        methods: {
            loadNoticia() {
                var id = this.$route.params.id;
                this.noticia = this.noticias.find( n => n.id == id);
            }
        },
        mounted() {
            this.loadNoticia();
        }
    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    #Noticia {
        margin-top: 100px;
        min-height: 100vh;
    }

    .noticia {
        margin-bottom: 50px;
    }

</style>
