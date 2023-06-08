<template>
    <div class="d-flex flex-stack py-2">
        <div>   </div>
        <div class="m-0">
            <span class="text-gray-400 fw-bold fs-5 me-2">
                Nie posiadasz konta?
            </span>

            <router-link to="/register" class="link-primary fw-bold fs-5">
                Zarejestruj się
            </router-link>
        </div>
    </div>

      <div class="py-20">
          <Form
              class="form w-100"
              @submit="onSubmitLogin"
              :validation-schema="data"
          >
              <div class="card-body">
                  <div class="text-start mb-10">
                      <h1 class="text-dark mb-3 fs-3x">
                          Zaloguj się
                      </h1>
                      <div class="text-gray-400 fw-semibold fs-6">
                          Uzyskaj dostęp do wszystkich funkcjonalności
                      </div>
                  </div>

<!--                  <div class="mb-10 bg-light-info p-8 rounded">-->
<!--                      <div class="text-info">-->
<!--                          Use account <strong>admin@demo.com</strong> and password-->
<!--                          <strong>demo</strong> to continue.-->
<!--                      </div>-->
<!--                  </div>-->

                  <div class="fv-row mb-8">
                      <Field
                          tabindex="1"
                          class="form-control form-control-lg form-control-solid"
                          type="text"
                          name="email"
                          autocomplete="off"
                      />
                      <div class="fv-plugins-message-container">
                          <div class="fv-help-block">
                              <ErrorMessage name="email" />
                          </div>
                      </div>
                  </div>

                  <div class="fv-row mb-7">
                      <Field
                          tabindex="2"
                          class="form-control form-control-lg form-control-solid"
                          type="password"
                          name="password"
                          autocomplete="off"
                      />
                      <div class="fv-plugins-message-container">
                          <div class="fv-help-block">
                              <ErrorMessage name="password" />
                          </div>
                      </div>
                  </div>

                  <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                      <div></div>
                      <router-link to="/forgot-password" class="link-primary">
                          Zapomniałeś hasła?
                      </router-link>
                  </div>

                  <div class="d-flex flex-stack">
                      <button
                          type="submit"
                          ref="loginButton"
                          id="kt_sign_in_submit"
                          class="btn btn-primary me-2 flex-shrink-0"
                      >
                          <span class="indicator-label">Kontynuuj</span>
                          <span class="indicator-progress">
                              Proszę czekać...
                              <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                          </span>
                      </button>


                      <div class="d-flex align-items-center">
                          <div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6" data-kt-translate="general-or">Lub</div>

                          <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                              <img alt="Logo" src="/media/svg/brand-logos/google-icon.svg" class="p-4"/>
                          </a>
                          <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                              <img alt="Logo" src="/media/svg/brand-logos/facebook-3.svg" class="p-4"/>
                          </a>
                          <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
                              <img alt="Logo" src="/media/svg/brand-logos/apple-black.svg" class="theme-light-show p-4"/>
                              <img alt="Logo" src="/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show p-4"/>
                          </a>
                      </div>
                  </div>
              </div>
          </Form>
    <!--    <button-->
    <!--        @click="asGuest()"-->
    <!--        class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5"-->
    <!--        ref="loginAsGuestButton"-->
    <!--    >-->
    <!--        Kontynuuj jako gość-->
    <!--    </button>-->
      </div>
</template>

<script lang="ts" setup>
  import { ErrorMessage, Field, Form } from "vee-validate";
  import store from "@/store";
  import { useRouter } from "vue-router";
  import * as Yup from "yup";
  import NotificationService from "@/core/services/NotificationService.ts";
  import { submitButtonProcess } from "@/core/services/SubmitHelper.ts";
  import {ref} from "vue";

  const loginButton = ref(null);
  const loginAsGuestButton = ref(null);

  const router = useRouter();
  const data = Yup.object().shape({
    email: Yup.string().email().required().label("Email"),
    password: Yup.string().min(8).required().label("Password"),
  });

  function asGuest() {
      submitButtonProcess(true, loginAsGuestButton);

      store
          .dispatch('auth/loginAsGuest')
          .then(() => {
              submitButtonProcess(false, loginAsGuestButton);
              NotificationService.success("Zalogowano jako gość");
              router.push({ name: "home" });
          })
  }

  function onSubmitLogin(values) {
      submitButtonProcess(true, loginButton);

      store
          .dispatch('auth/login', values)
          .then(() => {
              submitButtonProcess(false, loginButton);
              NotificationService.success("Zalogowano pomyślnie");
              router.push({ name: "home" });
          })
          .catch((err) => {
              submitButtonProcess(false, loginButton);
              NotificationService.error(err.response.data.message);
          });
  }
</script>
