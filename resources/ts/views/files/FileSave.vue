<template>
  <Form
      class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
      novalidate="novalidate"
      files="true"
      @submit="saveFile()"
  >
<!--      :validation-schema="fileValidator"-->
  <div class="card mb-5 mb-xl-10">
    <div
        class="card-header border-0 cursor-pointer"
        role="button"
        data-bs-toggle="collapse"
        data-bs-target="#files_save_overview"
        aria-expanded="true"
        aria-controls="files_save_overview"
    >
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">Dane podstawowe</h3>
      </div>
    </div>

    <div id="files_save_overview" class="collapse show">

        <div class="card-body border-top p-9">

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semobold fs-6">Nazwa dokumentu</label>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12 fv-row">
                  <Field
                      type="text"
                      name="name"
                      class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                      placeholder="Nazwa dokumentu"
                      v-model="file.name"
                  />
                  <div class="fv-plugins-message-container">
                    <div class="fv-help-block">
                      <ErrorMessage name="name" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semobold fs-6">Kod dokumentu</label>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12 fv-row">
                  <Field
                      type="text"
                      name="code"
                      class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                      placeholder="Kod dokumentu"
                      v-model="file.code"
                  />
                  <div class="fv-plugins-message-container">
                    <div class="fv-help-block">
                      <ErrorMessage name="code" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semobold fs-6">type type</label>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12 fv-row">
                  <Field
                      type="text"
                      name="type"
                      class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                      placeholder="type type"
                      v-model="file.type"
                  />
                  <div class="fv-plugins-message-container">
                    <div class="fv-help-block">
                      <ErrorMessage name="type" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semobold fs-6">file_category_id</label>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12 fv-row">
                  <Field
                      type="text"
                      name="file_category_id"
                      class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                      placeholder="file_category_id"
                      v-model="file.file_category_id"
                  />
                  <div class="fv-plugins-message-container">
                    <div class="fv-help-block">
                      <ErrorMessage name="file_category_id" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semobold fs-6">draft</label>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12 fv-row">
                  <Field
                      type="text"
                      name="draft"
                      class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                      placeholder="draft"
                      v-model="file.draft"
                  />
                  <div class="fv-plugins-message-container">
                    <div class="fv-help-block">
                      <ErrorMessage name="draft" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label required fw-semobold fs-6">file</label>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-12 fv-row">
                  <Field
                      type="file"
                      name="file"
                      class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                      v-model="file.file"
                  />
                  <div class="fv-plugins-message-container">
                    <div class="fv-help-block">
                      <ErrorMessage name="file" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <Field
                as="select"
                name="product_id"
                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                placeholder="Kod dokumentu"
                v-model="file.product_id"
                multiple="multiple"
            >
                <option value="1">Produkt o id 1</option>
                <option value="2">Produkt o id 2</option>
                <option value="3">Produkt o id 3</option>
            </Field>


          <button
              ref="submitButton"
              type="submit"
              class="btn btn-lg btn-primary w-100"
          >
            <span class="indicator-label"> Zapisz </span>
            <span class="indicator-progress">
            Proszę czekać...
            <span
                class="spinner-border spinner-border-sm align-middle ms-2"
            ></span>
          </span>
          </button>




        </div>
    </div>
  </div>

  </Form>
</template>

<script lang="ts" setup>
import {defineComponent, ref, onMounted, nextTick, computed} from "vue";
import { ErrorMessage, Field, Form } from "vee-validate";
import * as Yup from "yup";
import store from "@/store";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();


const submitButton = ref<HTMLButtonElement | null>(null);
// const fileValidator = Yup.object().shape({
//   name: Yup.string().required().label("Nazwa"),
// });

let file = ref({
  name: '',
  code: '',
  type: '',
  file_category_id: '',
  draft: '',
  file: '',
  product_id: [],
});

// if(typeof route.params.id != 'undefined') {
//   store
//       .dispatch("products/getProduct", route.params.id);
//   file = computed(() => store.state.products.product.data);
// }

function saveFile() {
  if (submitButton.value) {
    submitButton.value!.disabled = true;
    submitButton.value.setAttribute("data-kt-indicator", "on");
  }
  store
      .dispatch("files/saveFile", file.value)
      .then((res) => {
        // router.push({ name: "FileView", params: { id: res.data.data.id } });
        alert('Zapisano!');
      })
      .catch((err) => {
        submitButton.value?.removeAttribute("data-kt-indicator");
        submitButton.value!.disabled = false;
      });
}

</script>
