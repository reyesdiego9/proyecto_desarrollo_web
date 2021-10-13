import { createWebHistory, createRouter } from "vue-router";

import Login from "../components/Login";
// import Dashboard from "../components/Dashboard";
import Administrador from "../components/Administrador";
import Estudiante from "../components/Estudiante";

export const routes = [
    {
        name: "login",
        path: "/",
        component: Login,
    },
    {
        name: "administrador",
        path: "/administrador",
        component: Administrador,
    },
    {
        name: "estudiante",
        path: "/estudiante",
        component: Estudiante,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
