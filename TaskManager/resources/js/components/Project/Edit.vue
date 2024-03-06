<template>

    <div class="content-panel">
        <div class="container">

    <div v-if="project">

        <div class="mb-3">
        <label class="form-label">Заголовок задачи</label>
        <input type="text" class="form-control" placeholder="Название задачи" v-model="project.title">
        </div>
        <div class="mb-3">
        <label class="form-label">Текст</label>
        <input type="text" class="form-control" placeholder="Описание задачи" v-model="project.text">
        </div>

        <div class="mb-3">
        <label class="form-label">Статус</label>
        <fieldset>
    
          <div>
            <input id="done" name="done" type="checkbox" :checked="project.done === 1" v-model="project.done" />
            <label for="done" style="margin-left: 5px;">Готово</label>
          </div>

        </fieldset>
        </div>
       
        <p v-if="errors.length > 0" class="error-message">{{ errors[0] }}</p>
        <button type="submit" @click.prevent="$store.dispatch('update', {id: project.id, title: project.title, text: project.text, done: project.done, errors: [] })" class="btn-submit" id="update">Редактировать</button>


    </div>

       </div> 
    </div>
    </template>
    
<script>

        export default {
            name: "Edit", 

            mounted(){
                this.$store.dispatch('getProject', this.$route.params.id);
            },

            computed: {
                project(){
                    return this.$store.getters.project
                },

                errors(){
                    return this.$store.getters.errors
                },
                
            },
    
        }
    </script>
    