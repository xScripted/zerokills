<template>
    <div id="Calendario">
        <zk-menu></zk-menu>
        <div id="bg-logo" style="position: fixed"></div>
        <div class="title-section"> CALENDARIO </div>
        <div class="container calendar">
            <div class="match" v-for="(evento, index) of calendario" :key="index">
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
                        <button class="m-watch"> <span> Stream </span> 
                        </button>
                    </a>
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
            ...mapGetters(['calendario'])
        },
        methods: {
            ...mapActions(['loadCalendario'])
        },
        mounted() {
            if(this.calendario.length == 0) this.loadCalendario();
        }
    }
</script>

<style scoped lang="scss">
    @import '../../sass/media-queries';

    .title-section {
        margin-top: 100px;
    }

    .calendar {
        min-height: 100vh;
    }
</style>
