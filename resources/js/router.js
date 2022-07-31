import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import Page404 from "./pages/Page404";
import SinglePost from "./pages/SinglePost";
import Categories from "./pages/Categories";
import SingleCategory from "./pages/SingleCategory";
import SingleTag from "./pages/SingleTag";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about-us",
            name: "about",
            component: About
        },
        {
            path: "/categories",
            name: "categories",
            component: Categories
        },
        {
            path: "/category/:slug",
            name: "single-category",
            component: SingleCategory
        },
        {
            path: "/tag/:slug",
            name: "single-tag",
            component: SingleTag
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            path: "/*",
            name: "not-found",
            component: Page404
        },
    ]
});

export default router;