import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  
  routes: [

    {
      path: '/',
      name: '/',
      component: () => import('./components/Index.vue')
    },

    {
      path: '/projects/create',
      name: 'project.create',
      component: () => import('./components/Project/Create.vue')
    },

    {
      path: '/projects/:id/edit',
      name: 'project.edit',
      component: () => import('./components/Project/Edit.vue')
    },

    {
      path: '/projects/list',
      name: 'project.list',
      component: () => import('./components/Project/ProjectList.vue')
    },

  ]
})

export default router
