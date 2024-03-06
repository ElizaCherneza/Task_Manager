<template>
<div class="main-block">

    <div class="left-panel">

        <div class="container">

        
            <router-link :to="{ name: 'project.create' }" class="left-menu-rout">Добавить задачу</router-link>
         
            <router-link :to="{ name: 'project.list' }" class="left-menu-rout">Список задач</router-link>
           
           
        </div> 

    </div>

    <router-view></router-view>
    
</div>     

</template>

<script>

    export default {
        name: "Index", 


        data() {
            return{

            }
        },

    }
</script>
