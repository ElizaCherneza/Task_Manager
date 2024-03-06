import { createApp } from 'vue'
import Index from './components/Index.vue'
import router from './router'
import './bootstrap'
import store from './store'

const app = createApp(Index)
app.use(router)
app.use(store)
app.mount('#app')



