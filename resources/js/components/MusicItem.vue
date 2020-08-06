<template>
    <div v-bind:class="{music_itemon: music.id % 2 == 0}" class="music_item">
        <div class="item-title">
            <img v-on:click="play_pause" v-bind:src=icon_src alt="Start">
            <div>
                <div class="title-name">{{music.name}}</div>
                <div class="title-author"><a v-bind:href="href_i">{{music.artist.name}}</a></div>
            </div>
        </div>
        <a v-bind:href=src download><img class="music-time" v-bind:src=icon_download alt="Start"></a>
<!--        <div class="music-time">{{music.audio.duration | minutes}}</div>-->
    </div>
</template>

<script>
    export default {
        name: "MusicItem",
        props: {
            music: {
                type: Object
            },
            artist: String,
            index: Number,
            previousIndex: Number,
            changeIndex: Number,
            is_play: Boolean
        },
        data() {
            return {
                icon_src: '../assets/play.png',
                icon_download: '../assets/download.png',
                src: '../' + this.music.path,

                isplay: false,
                href_i: '/artists/' + this.music.artist_id,
            }
        },

        filters: {
            minutes(value) {
                var seconds = ''
                if ((parseInt(value) % 60) % 10 < 10 && parseInt(value) % 60 < 10) {
                    seconds = '0' + parseInt(value) % 60
                } else {
                    seconds = parseInt(value) % 60
                }

                return parseInt(value / 60) + ":" + seconds;
            }
        },

        watch: {
            changeIndex() {
                if (this.isplay === true) {
                    if (this.previousIndex === this.index) {
                        if (this.isplay === false) {
                            this.icon_src = '../assets/pause.png';
                            this.isplay = true;


                        } else {
                            this.icon_src = '../assets/play.png';
                            this.isplay = false;
                        }
                    }
                } else {
                    if (this.changeIndex === this.index) {
                        this.icon_src = '../assets/pause.png';
                        this.isplay = true;
                    }
                }
            },

            isplay() {
                if (this.changeIndex === this.index) {
                    if (this.is_play === false) {
                        // this.icon_src = 'assets/play.png';


                    } else {
                        if (this.is_play === true) {
                            // this.icon_src = 'assets/pause.png';
                        }

                    }
                }

            }

        },

        methods: {
            play_pause() {
                this.$emit('play-music', this.index)
                if (this.isplay == false) {
                    this.icon_src = '../assets/pause.png';
                    this.isplay = true;
                } else {
                    this.icon_src = '../assets/play.png';
                    this.isplay = false;
                }
            },

        },


    }
</script>

<style scoped>
    .item-title {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .item-title img {
        margin-right: 20px;
    }

    .music_item {
        margin: 0;
        padding: 5px 20px 5px 20px;
        display: flex;
        justify-content: space-between;
        color: white;
        background-color: #505050;
        align-items: center !important;
    }

    .music_itemon {
        margin: 0;
        padding: 5px 20px 5px 20px;
        display: flex;
        justify-content: space-between;
        color: white;
        background-color: #424242;
        align-items: center;
    }

    .music-time {
        justify-content: flex-end
    }

    .title-name {
        font-weight: bold;
    }

    .title-author a{
        color:lightgray !important;
    }

</style>
