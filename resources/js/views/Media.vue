<template>
    <div id="Media">
        <zk-menu></zk-menu>
        <div id="bg-logo" style="position: fixed"></div>
        <div class="title-section"> CLIPS </div>
        <div class="container clips">
            
            <div class="clip" v-for="(clip, index) of media" :key="index">
                <video class="video" controls>
                    <source :src="clip.url" type="video/mp4">
                </video>
                <div class="text">
                    {{ clip.text }}
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
                
            }
        },
        computed: {
            ...mapGetters(['media'])
        },
        methods: {
            ...mapActions(['loadMedia'])
        },
        mounted() {
            if(this.media.length == 0) this.loadMedia();
        }
    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    .title-section {
        margin-top: 100px;
    }

    .clips {
        min-height: 100vh;

        .video {
            width: 100%;
            border: 2px solid black;
        }

        .text {
            font-size: 22px;
            padding: 20px;
            text-align: center;
            margin-bottom: 100px;
        }
    }
</style>
