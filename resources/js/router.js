import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import About from './pages/About';
import SinglePost from './pages/SinglePost';
import Page404 from './pages/Page404';
import Categories from './pages/Categories';
import SingleCategory from './pages/SingleCategory';
import Tags from './pages/Tags';
import SingleTag from './pages/SingleTag';


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About,
        },
        {
            path: '/posts/:slug',
            name: 'single-post',
            component: SinglePost,
        },
        {
            path: '/categories',
            name: 'categories',
            component: Categories,
        },
        {
            path: '/categories/:slug',
            name: 'single-category',
            component: SingleCategory,
        },
        {
            path: '/tags',
            name: 'tags',
            component: Tags
        },
        {
            path: '/tags/:slug',
            name: 'single-tag',
            component: SingleTag,
        },
        {
            path: '/*',
            name: 'page-404',
            component: Page404,
        },
    ]
})

export default router;