require('./bootstrap')

import 'core-js/stable'
import "./../scss/app.scss"
import Books from "./components/Books"
import {createApp} from 'vue/dist/vue.esm-bundler'

createApp({
    components: {
        'books': Books
    },
}).mount('#app')
