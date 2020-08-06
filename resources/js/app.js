
require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('music-item', require('./components/MusicItem.vue').default);
Vue.component('music-list', require('./components/MusicList.vue').default);
Vue.component('music-app', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
});
