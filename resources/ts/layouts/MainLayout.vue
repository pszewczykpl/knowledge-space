<template>
  <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
      <KTHeader />
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
              <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                  <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack container-3xl">
                      <div class="`page-title d-flex flex-row justify-content-center flex-wrap me-3`">
                          <template v-if="pageTitle">
                              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                  {{ pageTitle }}
                              </h1>
                              <span class="h-20px border-gray-200 border-start mx-3"></span>
                              <span class="text-muted fw-semibold fs-7 my-0 pt-1">
                                  {{ description }}
                              </span>
                          </template>
                      </div>
                      <div class="d-flex align-items-center gap-2 gap-lg-3">
<!--                          <a-->
<!--                                  href="#"-->
<!--                                  class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary"-->
<!--                                  data-bs-toggle="modal"-->
<!--                                  data-bs-target="#kt_modal_create_app"-->
<!--                          >Rollover</a-->
<!--                          >-->
<!--                          <a-->
<!--                                  href="#"-->
<!--                                  class="btn btn-sm fw-bold btn-primary"-->
<!--                                  data-bs-toggle="modal"-->
<!--                                  data-bs-target="#kt_modal_new_target"-->
<!--                          >Add Target</a-->
<!--                          >-->
                      </div>
                  </div>
              </div>
              <div id="kt_app_content" class="app-content flex-column-fluid">
                  <div id="kt_app_content_container" class="app-container container-3xl">
                      <router-view></router-view>
                  </div>
              </div>
          </div>
          <div id="kt_app_footer" class="app-footer">
            <div class="app-container d-flex flex-column flex-md-row flex-center flex-md-stack py-3 container-3xl">
              <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2022©</span>
                <span class="text-gray-800">{{ appName }}</span>
              </div>
              <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                  <a href="https://linkedin.com/in/pszewczykpl" target="_blank" class="menu-link px-2">Piotr Szewczyk</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {computed, nextTick, onBeforeMount, onMounted, watch} from "vue";
  import KTHeader from "@/layouts/main-layout/header/Header.vue";
  import { useRoute } from "vue-router";
  import { reinitializeComponents } from "@/assets/ts";
import store from "@/store";

  const route = useRoute();
  const pageTitle = computed(() => route.meta.pageTitle );
  const description = computed(() => route.meta.description );



  const appName = import.meta.env.VITE_APP_NAME;

  onMounted(() => {
      store.dispatch("auth/getUser");
  });

  onBeforeMount(() => {
      document.body.className = "";
      for (let i = document.body.attributes.length; i-- > 0; )
          document.body.removeAttributeNode(document.body.attributes[i]);
          document.body.setAttribute('id', 'kt_app_body');
          document.body.setAttribute('data-kt-app-layout', 'dark-header');
          document.body.classList.add('app-dark-header');
          document.body.setAttribute('data-kt-app-toolbar-enabled', 'true');
          document.body.setAttribute('data-kt-app-header-fixed', 'true');
      });

  onMounted(() => {
    nextTick(() => {
      reinitializeComponents();
    });
  });

  watch(
    () => route.path,
    () => {
      nextTick(() => {
        reinitializeComponents();
      });
    }
  );
</script>
