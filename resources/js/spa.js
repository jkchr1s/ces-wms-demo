'use strict';

import Vue from 'vue';
import MovieApp from './components/MovieApp.vue';

(function() {
    return new Vue({
        el: '#app',
        components: {MovieApp},
        template: '<movie-app></movie-app>'
    });
})();
