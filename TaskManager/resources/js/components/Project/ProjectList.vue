<template>

    <div>
        <div class="content-panel">
           
            <div class="container">
                
                <div style="margin-bottom: 25px;">
                    <label style="margin-right: 5px;">Фильтрация:</label>
                    <select id="select_projects" @change="filter_projects_done">
                        <option value="all_projects" selected>Вывести все задачи</option>
                        <option value="is_not_done">Вывести задачи в работе</option>
                        <option value="is_done">Вывести готовые задачи</option>
                    </select>
                </div>

                <div>
                    <table class="table">
                        <thead>
                            <tr class="table-head">
                                <td style="border-radius: 8px 0 0 0; width: 350px;">
                                    Заголовок задачи
                                </td>
                                <td>
                                    Текст
                                </td>   
                                <td style="width: 100px;">
                                    Статус
                                </td>                      
                                <td class="table-btns" style="border-radius: 0 8px 0 0;">

                                </td>

                            </tr>
                        </thead>
                        <tbody v-for="project in projects">
                            <tr>
                                <td>
                                    {{ project.title }}
                                </td>
                                <td>
                                    {{ project.text }}
                                </td>  
                                <td>
                                    {{ project.done === 0 ? 'В работе' : 'Готово' }}
                                </td>                     
                                <td class="table-btns">
                                    <div>
                                         <router-link :to="{ name: 'project.edit', params: {id: project.id} }"><button class="btn btn-outline-primary" title="Редактировать">Редактировать</button></router-link>
                                    
                                        <button class="btn btn-outline-danger" title="Удалить" @click.prevent="deleteProject">Удалить</button>
                                    </div>
                                
                                </td>

                            </tr>
                        </tbody>
                </table>
                </div>

            </div> 
    
        </div>
    </div>

    </template>
    
<script>
import axios from 'axios';   

export default {
            name: "ProjectList", 


    data() {
        return{
            projects: null,
            originalAllProjects: null,
        }
    },


    mounted(){
        this.getProjects();
        this.user_id  = document.getElementById('app').getAttribute('data-user-id');
    },


    methods:{

        getProjects(){
                axios.get('/api/projects')
                .then( res => {
                    this.projects = res.data; 
                    this.filterProjects();  
                    this.originalAllProjects = this.projects; // Сохранение исходных данных перед фильтрацией
                    this.filter_projects_done(); // Применить фильтрацию после получения данных                  
                })
        },

        filter_projects_done() {
            const selectedValue = document.getElementById('select_projects').value;

            if (selectedValue === 'is_done') {
                this.projects = this.originalAllProjects.filter(project => project.done === 1);
            } else 
            if (selectedValue === 'is_not_done') {                
                this.projects = this.originalAllProjects.filter(project => project.done === 0);
            } else
             if (selectedValue === 'all_projects') {
                // Если выбрано "Вывести все задачи", не применяем фильтрацию
                this.projects = this.originalAllProjects;
            }
        },

        filterProjects() {
            this.projects = this.projects.filter(project => project.user_id === parseInt(this.user_id));
        },

        deleteProject(id){
            axios.delete('/api/projects/' + id)
            .then( res => {
                console.log('Задача ' + id + ' удалена');
                this.getProjects();
            })
        },

    },

           
}
</script>
    