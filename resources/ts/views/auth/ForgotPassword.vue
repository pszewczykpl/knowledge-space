<template>
  <div class="w-lg-500px p-10">
    <Form
        class="form w-100"
        id="kt_login_signin_form"
        @submit="onSubmitLogin"
        :validation-schema="login"
    >
      <div class="text-center mb-10">
        <h1 class="text-dark mb-3">Przypomnij hasło</h1>
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

      <!--begin::Input group-->
      <div class="fv-row mb-10">
        <!--begin::Label-->
        <label class="form-label fs-6 fw-bold text-dark">Email</label>
        <!--end::Label-->

        <!--begin::Input-->
        <Field
            tabindex="1"
            class="form-control form-control-lg form-control-solid"
            type="text"
            name="email"
            autocomplete="off"
        />
        <!--end::Input-->
        <div class="fv-plugins-message-container">
          <div class="fv-help-block">
            <ErrorMessage name="email" />
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
  import { defineComponent, ref } from "vue";
  import { ErrorMessage, Field, Form } from "vee-validate";
  import store from "@/store";
  import { useRouter } from "vue-router";
  import * as Yup from "yup";
  import {submitButtonProcess} from "@/core/services/SubmitHelper.ts";
  import NotificationService from "@/core/services/NotificationService.ts";

  const router = useRouter();

  const submitButton = ref<HTMLButtonElement | null>(null);

  const login = Yup.object().shape({
    email: Yup.string().email().required().label("Email"),
  });

  function onSubmitLogin(values) {
      submitButtonProcess(true, submitButton);

    store
        .dispatch('auth/forgotPassword', values)
        .then(() => {
            NotificationService.success("Wysłano link do zmiany hasła");
            submitButtonProcess(false, submitButton);
        })
        .catch((err) => {
            NotificationService.error(err.response.data.message.toString());
            submitButtonProcess(false, submitButton);
        });
  }
</script>
