# vue js
* https://laravel.com/docs/9.x/vite#vue
* https://www.youtube.com/watch?v=tnXu89O9Wl0&list=PLki9ogssS_Jm-ghEkgDGeKJ2VLT31Tk1J&index=2&ab_channel=CorneGrammDesarrolloweb-Webdevelopment



```js
import vueRouter from 'vue-routet
Vue.use(vueRouter);

import xxx from 'ruta.vue';

const ruta= [
    {
        path: '/ruta',
        component:form
    }
];
const router = VueRouter({ruta});

const app = new Vue({
    el:'#app',
    router
});
```
```html
<route-link
    to="/path"
    class="todo"
    active-class="class"
    exact>link</route-link>
<router-view/>