<template>
    <div ref="childComponent">
        <div class="musiclist">
            <div>
                <MusicItem
                        v-for="(music, i) in playlist"
                        v-bind:music="music"
                        v-bind:index="i"
                        v-bind:changeIndex="changeIndex"
                        v-bind:previousIndex="previousIndex"
                        v-bind:is_play="isplay"
                        v-on:play-music="playmusic"

                />
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    import MusicItem from './MusicItem'
    export default {
        props: [
            'playlist',
            'changeIndex',
            'previousIndex',
            'isplay',
        ],

        name: "Music-item-list",

        methods: {
            playmusic(index) {
                this.$emit('play-music', index)
            },
        },

        components: {
            MusicItem
        },

    }


</script>

<style scoped>

    .musiclist {
        font-size: 1em;
        background-color: #424242;
    }


</style>
