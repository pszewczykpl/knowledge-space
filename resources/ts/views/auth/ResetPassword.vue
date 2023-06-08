<template>
  <div class="w-lg-500px p-10">
    <Form
        class="form w-100"
        id="reset_password_form"
        @submit="onSubmit"
        :validation-schema="resetPassword"
    >
      <div class="text-center mb-10">
        <h1 class="text-dark mb-3">Zresetuj hasło</h1>
        <!--end::Title-->

        <!--begin::Link-->
<!--        <div class="text-gray-400 fw-semobold fs-4">-->
<!--          Nie posiadasz konta?-->

<!--          <router-link to="/register" class="link-primary fw-bold">-->
<!--            Stwórz konto-->
<!--          </router-link>-->
<!--        </div>-->
        <!--end::Link-->
      </div>
      <!--begin::Heading-->

<!--      <div class="mb-10 bg-light-info p-8 rounded">-->
<!--        <div class="text-info">-->
<!--          Use account <strong>admin@demo.com</strong> and password-->
<!--          <strong>demo</strong> to continue.-->
<!--        </div>-->
<!--      </div>-->

        <Field
            tabindex="-1"
            class="d-none"
            type="text"
            name="token"
            v-model="token"
        />

      <div class="fv-row mb-10">
        <label class="form-label fs-6 fw-bold text-dark">Email</label>

        <Field
            tabindex="1"
            class="form-control form-control-lg form-control-solid"
            type="text"
            name="email"
            autocomplete="off"
            v-model="email"
        />
        <div class="fv-plugins-message-container">
          <div class="fv-help-block">
            <ErrorMessage name="email" />
          </div>
        </div>
      </div>

      <div class="fv-row mb-10">
          <label class="form-label fs-6 fw-bold text-dark">Hasło</label>

          <Field
              tabindex="1"
              class="form-control form-control-lg form-control-solid"
              type="text"
              name="password"
              autocomplete="off"
          />
          <div class="fv-plugins-message-container">
              <div class="fv-help-block">
                  <ErrorMessage name="password" />
              </div>
          </div>
      </div>
      <div>
        <Field
              tabindex="1"
              class="form-control form-control-lg form-control-solid"
              type="text"
              name="password_confirmation"
              autocomplete="off"
          />
          <div class="fv-plugins-message-container">
              <div class="fv-help-block">
                  <ErrorMessage name="password_confirmation" />
              </div>
          </div>
      </div>

      <div class="text-center">
        <button
            type="submit"
            ref="submitButton"
            id="kt_sign_in_submit"
            class="btn btn-lg btn-primary w-100 mb-5"
        >
          <span class="indicator-label"> Przypomnij hasło </span>

          <span class="indicator-progress">
            Proszę czekać...
            <span
                class="spinner-border spinner-border-sm align-middle ms-2"
            ></span>
          </span>
        </button>

      </div>
    </Form>
  </div>
</template>

<script lang="ts" setup>
import {defineComponent, onMounted, ref} from "vue";
  import { ErrorMessage, Field, Form } from "vee-validate";
  import store from "@/store";
  import { useRouter } from "vue-router";
  import * as Yup from "yup";
import NotificationService from "@/core/services/NotificationService.ts";

  const router = useRouter();

  const submitButton = ref(null);

  const resetPassword = Yup.object().shape({
      email: Yup.string().email().required().label("Email"),
      password: Yup.string().required().label("Hasło"),
      password_confirmation: Yup.string().required().label("Hasło"),
      token: Yup.string().required().label("Token")
  });

  let token = ref(null);
  let email = ref(null);

  onMounted(() => {
      const urlParams = new URLSearchParams(window.location.search);
      token.value = urlParams.get('token');
      email.value = urlParams.get('email');
  });

function onSubmit(values) {
    if (submitButton.value) {
        submitButton.value.disabled = true;
        submitButton.value.setAttribute("data-kt-indicator", "on");
    }

    store
        .dispatch('auth/resetPassword', values)
        .then(() => {
            NotificationService.success("Hasło zostało zmienione.");
        })
        .then(() => router.push("/login"))
        .catch((err) => {
            if (submitButton.value) {
                submitButton.value.removeAttribute("data-kt-indicator");
                submitButton.value.disabled = false;
            }
        });
}
</script>
