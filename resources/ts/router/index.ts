import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import store from "../store";
import { isAdmin } from "@/core/services/AuthService";

/**
 * Route list
 *
 * /home
 * /products
 * /products/create
 * /products/:id
 * /products/:id/files
 * /products/:id/comments
 * /products/:id/releases
 * /products/:id/releases/:id/files
 * /products/:id/edit
 *
 */
const routes:any = [
  {
    path: "/",
    redirect: "/home",
    component: () => import("@/layouts/MainLayout.vue"),
    meta: { requiresAuth: true },
    children: [{
        path: "/home",
        name: "home",
        component: () => import("@/views/Dashboard.vue"),
        meta: { pageTitle: "Strona główna" },
      }, {
        path: "/products",
        name: "Products",
        component: () => import("@/views/products/Products.vue"),
        meta: { pageTitle: "Archiwum produktowe", description: "Przeglądaj wszystkie produkty" },
      }, {
        path: "/products/create",
        name: "ProductCreate",
        component: () => import("@/views/products/ProductSave.vue"),
        meta: { pageTitle: "Dodaj produkt", requiresAdmin: true },
      }, {
        path: "/products/:id",
        component: () => import("@/views/products/ProductView.vue"),
        meta: { pageTitle: "Szczegóły produktu", description: "Przeglądaj szczegóły produktu" },
        children: [{
            path: "",
            name: "ProductView",
            component: () => import("@/views/products/ProductViewHome.vue"),
          }, {
            path: "files",
            name: "ProductViewFiles",
            component: () => import("@/views/products/ProductViewFiles.vue"),
          }]
      }, {
        path: "/products/:id/edit",
        name: "ProductUpdate",
        component: () => import("@/views/products/ProductSave.vue"),
        meta: { pageTitle: "Edytuj produkt", requiresAdmin: true },
      }, {
        path: "/files/create",
        name: "FileCreate",
        component: () => import("@/views/files/FileSave.vue"),
        meta: { pageTitle: "Dodaj dokument" },
      }, {
        path: "/links",
        name: "Links",
        component: () => import("@/views/links/Links.vue"),
        meta: { pageTitle: "Linki", description: "Przeglądaj wszystkie linki" },
      }, {
        path: "/links/create",
        name: "LinkCreate",
        component: () => import("@/views/links/LinkSave.vue"),
        meta: { pageTitle: "Dodaj link", requiresAdmin: true },
      }, {
        path: "/links/:id/edit",
        name: "LinkUpdate",
        component: () => import("@/views/links/LinkSave.vue"),
        meta: { pageTitle: "Edytuj link", requiresAdmin: true },
      }, {
        path: "/file-categories",
        name: "FileCategories",
        component: () => import("@/views/file-categories/FileCategories.vue"),
        meta: { pageTitle: "Kategorie plików", description: "Przeglądaj wszystkie kategorie plików" },
      },
      {
        path: "/file-categories/create",
        name: "FileCategoryCreate",
        component: () => import("@/views/file-categories/FileCategorySave.vue"),
        meta: { pageTitle: "Dodaj kategorię plików", requiresAdmin: true },
      },
      {
        path: "/file-categories/:id/edit",
        name: "FileCategoryUpdate",
        component: () => import("@/views/file-categories/FileCategorySave.vue"),
        meta: { pageTitle: "Edytuj kategorię plików", requiresAdmin: true },
      }, {
        path: "/funds",
        name: "Funds",
        component: () => import("@/views/funds/Funds.vue"),
        meta: { pageTitle: "Fundusze", description: "Przeglądaj wszystkie fundusze" },
      },
      {
        path: "/funds/create",
        name: "FundCreate",
        component: () => import("@/views/funds/FundSave.vue"),
        meta: { pageTitle: "Dodaj fundusz", requiresAdmin: true },
      },
      {
        path: "/funds/:id/edit",
        name: "FundUpdate",
        component: () => import("@/views/funds/FundSave.vue"),
        meta: { pageTitle: "Edytuj fundusz", requiresAdmin: true },
      }],
  }, {

    /**
     * Login routes
     */
    path: '/',
    redirect: "/login",
    component: () => import("@/layouts/AuthLayout.vue"),
    meta: { isGuest: true },
    children: [{
        path: "/login",
        name: "login",
        component: () => import("@/views/auth/Login.vue"),
      }, {
        path: "/register",
        name: "register",
        component: () => import("@/views/auth/Register.vue"),
      }, {
        path: "/forgot-password",
        name: "ForgotPassword",
        component: () => import("@/views/auth/ForgotPassword.vue"),
    }, {
        path: "/reset-password",
        name: "ResetPassword",
        component: () => import("@/views/auth/ResetPassword.vue"),
    }],
  }, {

    /**
     * Error routes
     */
    path: "/",
    component: () => import("@/layouts/SystemLayout.vue"),
    children: [{
        path: "/404",
        name: "404",
        component: () => import("@/views/auth/Error404.vue"),
        meta: { pageTitle: "Błąd 404" },
      }, {
        path: "/500",
        name: "500",
        component: () => import("@/views/auth/Error500.vue"),
        meta: { pageTitle: "Błąd 500" },
      }],
  }, {
    path: "/:pathMatch(.*)*",
    redirect: "/404",
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(async (to, from) => {
  if (to.meta.requiresAuth && !store.state.auth.user.authenticated) {
    return { name: 'login' }
  } else if (store.state.auth.user.authenticated && to.meta.isGuest) {
    return { name: 'home' }
  }

  if(to.meta.requiresAdmin && !store.getters['auth/hasRole']('admin')) {
    return { name: 'home' }
  }

  // Scroll page to top on every route change
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });

});

export default router;
