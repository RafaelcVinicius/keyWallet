const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      { path: "/", component: () => import("pages/IndexPage.vue") },
      { path: "/login", component: () => import("pages/auth/LoginPage.vue") },
      {
        path: "/register",
        component: () => import("pages/auth/RegisterPage.vue"),
      },
      {
        path: "/new-key",
        component: () => import("pages/records/NewKey.vue"),
      },
      {
        path: "/manager-key",
        component: () => import("pages/records/ManagerKey.vue"),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
