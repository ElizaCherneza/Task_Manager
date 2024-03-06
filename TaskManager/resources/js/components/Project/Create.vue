<template>

    <div class="content-panel">
        <div class="container">
   
    <div>

        <div class="mb-3">
        <label class="form-label">Заголовок задачи</label>
        <input type="text" class="form-control" placeholder="Название задачи" v-model="title">
        </div>
        <div class="mb-3">
        <label class="form-label">Текст</label>
        <input type="text" class="form-control" placeholder="Описание задачи" v-model="text">
        </div>
       
        <p v-if="errors.length > 0" class="error-message">{{ errors[0] }}</p>
        <button type="submit" @click.prevent="$store.dispatch('store', {user_id: this.user_id, title, text, errors: [] })" class="btn-submit" id="create">Создать</button>


    </div>

       </div> 
    </div>
    </template>
    
<script>
import axios from 'axios';

        export default {
            name: "Create", 
    
            data() {
                return{
                    title: null,
                    text: null,                  
                    errors: [],
                    
                }
            },

            mounted(){
                this.user_id  = document.getElementById('app').getAttribute('data-user-id');
            },

            computed: {

                errors(){
                    return this.$store.getters.errors
                },
                
            },
    
        }
    </script>
    