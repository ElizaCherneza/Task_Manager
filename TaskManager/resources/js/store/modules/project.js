import axios from 'axios';
import router from '../../router';

const state = {
    project: null,
    errors: [],

}

const getters = {

    project(state) {
        return state.project},

    errors(state) {
        return state.errors},

}

const actions = {

    getProject({commit}, id){
        axios.get(`/api/projects/${id}`)
        .then( res => {  
            commit('setProject', res.data)                
                               
        }) 
        .catch(error => {
            console.error("Ошибка получения данных для редактирования", error);
        });
    },

    update({commit }, data){
        commit('clearErrors');

        let errors = [];

        if (!data.title || !data.text) {
            errors.push("Пожалуйста, заполните все поля!");
        } 
        if (errors.length > 0) {
            commit('setErrors', errors);
        }
        else {

        axios.patch(`/api/projects/${data.id}`, {title: data.title, text: data.text, done: data.done})
        .then( res => {
            router.push({name: 'project.list'});
            console.log('> Задача успешно изменена.');
            
        })
    }
    }, 

    store({commit}, data){
        commit('clearErrors');

        let errors = [];

        if (!data.title || !data.text) {
            errors.push("Пожалуйста, заполните все поля!");
        } 
        if (errors.length > 0) {
            commit('setErrors', errors);
        }
         else {

        axios.post('/api/projects', {title: data.title, text: data.text, user_id: data.user_id})
        .then( res => {
            router.push({name: 'project.list'});
            console.log('> Задача успешно занесена в базу.')
            
        })
    }
    },


}

const mutations = {

    setProject(state, project){
            state.project = project
    },

    setErrors(state, errors) {
        state.errors = errors;
    },
    clearErrors(state) {
        state.errors = [];
    }

}

export default {
    state, mutations, getters, actions
}