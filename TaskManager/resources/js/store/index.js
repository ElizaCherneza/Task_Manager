import { createApp } from 'vue'
import Vuex from 'vuex'
import Project from './modules/project'

const app = createApp()
app.use(Vuex)


export default new Vuex.Store({
    modules:{
        Project
    }
})