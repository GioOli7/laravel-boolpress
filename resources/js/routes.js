// dipendenze
import Vue from "vue";
import VueRouter from "vue-router";

//componenti per le pagine
import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Blog from "./pages/Blog.vue";
import PostDetail from "./pages/PostDetail.vue";
import NotFound from "./pages/NotFound.vue";

//registrazione route con vue
Vue.use(VueRouter);

// definizione rotte app
const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: "/blog/:slug",
            name: "post-detail",
            component: PostDetail
        },
        {
            path: "/*",
            component: NotFound
        }
    ]
});

export default router;
