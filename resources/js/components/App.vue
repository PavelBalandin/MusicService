<template>
    <div id="app">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK:wght@300&display=swap" rel="stylesheet">
        <Title
            v-bind:music="this.playlist[index]"
            v-bind:seek="this.seek"
            v-on:change_current_time="change_current_time"
        />
        <MusicList
                v-bind:playlist="playlist"
                v-bind:change-index="index"
                v-bind:previous-index="previndex"
                v-bind:isplay="isplay"
                v-on:play-music="playmusic"

        />
    </div>
</template>

<script>
    import MusicList from './MusicList.vue'
    import Title from './Title.vue'
    export default {
        name: 'App',

        props: [
            'playlist',
        ],

        data() {
            return {
                index: 0,
                previndex: 0,
                isplay: false,
                volume_level: 0.5,
                seek: 0,
                filter: '',
            }
        },

        created() {
            this.playlist.forEach((track) => {
                track.audio = new Audio('../'+track.path);
            })

        },

        methods:{
            next_track() {
                if (this.playlist[this.index + 1] != undefined) {
                    this.playmusic(this.index + 1);
                }
            },

            playmusic(i) {
                this.previndex = this.index;
                this.index = i;
                this.current = this.playlist[this.index];
                if (this.isplay == false) {
                    this.current.audio.play();
                    this.current.audio.volume = this.volume_level;
                    this.isplay = true;
                    this.icon_src = 'assets/pause.png';
                } else {
                    this.current = this.playlist[this.previndex]
                    this.current.audio.pause();
                    this.isplay = false;
                    this.icon_src = 'assets/play.png';
                    if (this.previndex != this.index) {
                        this.current = this.playlist[this.index]
                        this.current.audio.play();
                        this.current.audio.volume = this.volume_level;
                        this.isplay = true;
                        this.icon_src = 'assets/pause.png';

                    }
                }
            },

            change_current_time(current_time) {
                if (this.current != undefined) {
                    this.current.audio.currentTime = current_time;
                }
            },
        },
        watch: {
            isplay() {
                this.seek = this.current.audio.currentTime;
                let updateSeek
                if (this.isplay) {
                    updateSeek = setInterval(() => {
                        this.seek = this.current.audio.currentTime;
                    }, 500)
                } else {
                    clearInterval(updateSeek)
                }
            },

            seek() {
                if (this.seek == this.current.audio.duration) {
                    this.next_track();
                }
            }

        },


        components: {
            MusicList,
            Title
        }

    }
</script>

<style>

    body {
        background-color: #303030;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        flex-direction: column;
        font-family: 'Noto Sans HK', sans-serif;
        color: white;
    }

    hr {
        color: lightgrey;
        padding: 0;
        margin: 0;
    }

    img {
        opacity: 0.85;
    }

    img:active {
        padding-bottom: 3px;
    }

    img:hover {
        opacity: 1;
    }
</style>
