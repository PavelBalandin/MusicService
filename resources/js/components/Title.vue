<template>
    <div>
        <div class="player-z">
            <div class="player">
                <div class="title">
                    <span class="title-music">{{music.name}}</span>
                    <span class="title-author">{{music.artist.name}} </span>
                </div>


                <div class="title-time">
                    <span>{{seek | minutes}}</span>
                    <span>/</span>
                    <span class="music-time">{{(music.audio.duration ? music.audio.duration  : '') | minutes}}</span>
                </div>

            </div>
            <input v-on:change="change_current_time" type="range" id="during" name="during"
               min="0" v-bind:max=music.audio.duration v-model="seek">
        </div>
        <hr>
    </div>
</template>

<script>
    export default {
        props: ['music', 'seek'],
        name: "Music-info",

        filters: {
            minutes(value) {
                if(value === ''){
                    return '0:00';
                }
                var seconds = ''
                if ((parseInt(value) % 60) % 10 < 10 && parseInt(value) % 60 < 10) {
                    seconds = '0' + parseInt(value) % 60
                } else {
                    seconds = parseInt(value) % 60
                }

                return parseInt(value / 60) + ":" + seconds;
            }
        },

        methods: {
            change_current_time() {
                this.$emit('change_current_time', this.seek)
            },

        },

    }
</script>

<style scoped>
    .player-z {
        background-color: #424242;
    }
    .player {
        padding: 0 20px;
        margin: 0px 0 0 0;
        height: 80px;
        background-color: #424242;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 26px;
    }

    .title {
        width: 70%;
    }

    .title-music {
        font-weight: bold;
        color: white;
        font-size: 0.7em;
    }

    .title-author {
        opacity: 0.9;
        color: white;
        font-size: 0.7em;
    }

    .title-time {
        font-size: 0.7em;
        opacity: 0.85;
    }

    #during {
        width: 100%;
    }
</style>
