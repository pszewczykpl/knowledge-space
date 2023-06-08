<template>
    <div v-if="loading">
        Ładowanie...
    </div>
    <Form @submit="saveProduct()" :validation-schema="productValidator" novalidate="novalidate" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">
        <button ref="submitButton" type="submit" class="btn btn-lg btn-primary mb-5">
            <span class="indicator-label">Zapisz</span>
            <span class="indicator-progress">Proszę czekać...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>

        <FormPanel title="Dane podstawowe">
            <FormRow label="Nazwa produktu" required>
                <Field type="text" name="name" v-model="product.name" placeholder="Nazwa produktu" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="name" />
            </FormRow>

            <FormRow label="Kod TOiL">
                <Field type="text" name="code_toil" v-model="product.code_toil" placeholder="Kod TOiL" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="code_toil" />
            </FormRow>

            <FormRow label="Kod OWU">
                <Field type="text" name="code_owu" v-model="product.code_owu" placeholder="Kod OWU" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="code_owu" />
            </FormRow>

            <FormRow label="Kod produktu">
                <Field type="text" name="code" v-model="product.code" placeholder="Kod produktu" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="code" />
            </FormRow>

            <FormRow label="Grupa produktowa">
                <div class="row">
                    <div class="col-lg-6 fv-row">
                        <Field type="text" name="group_code" v-model="product.group_code" placeholder="Kod grupy produktowej" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                        <ErrorMsg name="group_code" />
                    </div>
                    <div class="col-lg-6 fv-row">
                        <Field type="text" name="group_name" v-model="product.group_name" placeholder="Nazwa grupy produktowej" class="form-control form-control-lg form-control-solid"/>
                        <ErrorMsg name="group_name" />
                    </div>
                </div>
            </FormRow>

            <FormRow label="Rodzaj produktu">
                <Field name="kind" as="select" v-model="product.kind" placeholder="Rodzaj produktu" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    <option value="I">Inwestycyjny</option>
                    <option value="P">Ochronny</option>
                    <option value="E">Pracowniczy</option>
                    <option value="B">Bancassurance</option>
                </Field>
                <ErrorMsg name="kind" />
            </FormRow>

            <FormRow label="Typ produktu">
                <Field name="type" as="select" v-model="product.type" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    <option value="G">Grupowy</option>
                    <option value="I">Indywidualny</option>
                </Field>
                <ErrorMsg name="type" />
            </FormRow>
        </FormPanel>

        <FormPanel title="Partner">
            <FormRow label="Nazwa partnera">
                <Field type="text" name="partner_name" v-model="product.partner_name" placeholder="Nazwa partnera" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="partner_name" />
            </FormRow>

            <FormRow label="Kod partnera">
                <Field type="text" name="partner_code" v-model="product.partner_code" placeholder="Kod partnera" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="partner_code" />
            </FormRow>
        </FormPanel>

        <FormPanel title="Warunki Ubezpieczenia">
            <FormRow label="Wiek ubezpieczającego">
                <div class="row">
                    <div class="col-lg-6 fv-row">
                        <Field type="text" name="insurer_min_age" v-model="product.insurer_min_age" placeholder="Minimalny wiek ubezpieczającego" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                        <ErrorMsg name="insurer_min_age" />
                    </div>
                    <div class="col-lg-6 fv-row">
                        <Field type="text" name="insurer_max_age" v-model="product.insurer_max_age" placeholder="Maksymalny wiek ubezpieczającego" class="form-control form-control-lg form-control-solid"/>
                        <ErrorMsg name="insurer_max_age" />
                    </div>
                </div>
            </FormRow>

            <FormRow label="Wiek ubezpieczonego">
                <div class="row">
                    <div class="col-lg-6 fv-row">
                        <Field type="text" name="insured_min_age" v-model="product.insured_min_age" placeholder="Minimalny wiek ubezpieczonego" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                        <ErrorMsg name="insured_min_age" />
                    </div>
                    <div class="col-lg-6 fv-row">
                        <Field type="text" name="insured_max_age" v-model="product.insured_max_age" placeholder="Maksymalny wiek ubezpieczonego" class="form-control form-control-lg form-control-solid"/>
                        <ErrorMsg name="insured_max_age" />
                    </div>
                </div>
            </FormRow>

            <FormRow label="Okres ubezpieczenia">
                <Field type="text" name="period_of_insurance" v-model="product.period_of_insurance" placeholder="Okres ubezpieczenia" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="period_of_insurance" />
            </FormRow>

            <FormRow label="Typ składki">
                <Field type="text" name="premium_type" v-model="product.premium_type" placeholder="Typ składki" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="premium_type" />
            </FormRow>
        </FormPanel>

        <FormPanel title="Subskrypcja">
            <FormRow label="Produkt subskrypcyjny">
                <div class="col-lg-9 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                        <Field type="checkbox" name="is_subscriptions" v-model="product.is_subscriptions" :value="1" :unchecked-value="0" class="form-check-input w-45px h-30px"/>
                    </div>
                </div>
                <ErrorMsg name="is_subscriptions" />
            </FormRow>

            <template v-if="product.is_subscriptions">
                <FormRow label="Kod subskrypcji">
                    <Field type="text" name="subscription_code" v-model="product.subscription_code" placeholder="Kod subskrypcji" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                    <ErrorMsg name="subscription_code" />
                </FormRow>

                <FormRow label="Status subskrypcji">
                    <Field type="text" name="subscription_status" v-model="product.subscription_status" placeholder="Status subskrypcji" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                    <ErrorMsg name="subscription_status" />
                </FormRow>

                <FormRow label="Okres subskrypcji">
                    <div class="row">
                        <div class="col-lg-6 fv-row">
                            <Field type="text" name="subscription_date_from" v-model="product.subscription_date_from" placeholder="Początek okresu subskrypcji" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                            <ErrorMsg name="subscription_date_from" />
                        </div>
                        <div class="col-lg-6 fv-row">
                            <Field type="text" name="subscription_date_to" v-model="product.subscription_date_to" placeholder="Koniec okresu subskrypcji" class="form-control form-control-lg form-control-solid"/>
                            <ErrorMsg name="subscription_date_to" />
                        </div>
                    </div>
                </FormRow>
            </template>
        </FormPanel>

        <FormPanel title="System produktowy">
            <FormRow label="System produktowy">
                <Field type="text" name="system_name" v-model="product.system_name" placeholder="System produktowy" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="system_name" />
            </FormRow>

            <FormRow label="Status wdrożenia">
                <Field type="text" name="system_status" v-model="product.system_status" placeholder="Status wdrożenia" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="system_status" />
            </FormRow>
        </FormPanel>

        <FormPanel title="Dokumenty produktowe">
            <FormRow label="Data udostępnienia dokumentów">
                <Field type="date" name="published_at" v-model="product.published_at" placeholder="Data udostępnienia dokumentów" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
                <ErrorMsg name="published_at" />
            </FormRow>

            <FormRow label="Dokumenty archiwalne">
                <div class="col-lg-9 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                        <Field type="checkbox" name="is_archived" :value="1" :unchecked-value="0" v-model="product.is_archived" class="form-check-input w-45px h-30px"/>
                    </div>
                </div>
                <ErrorMsg name="is_archived" />
            </FormRow>
        </FormPanel>
    </Form>
</template>

<script lang="ts" setup>
import { defineComponent, ref, onMounted, nextTick, computed } from "vue";
import { ErrorMessage, Field, Form } from "vee-validate";
import * as Yup from "yup";
import store from "@/store";
import { useRoute, useRouter } from "vue-router";

import FormPanel from "@/components/form/FormPanel.vue";
import ErrorMsg from "@/components/form/ErrorMsg.vue";
import FormRow from "@/components/form/FormRow.vue";

const route = useRoute();
const router = useRouter();
const submitButton = ref<HTMLButtonElement | null>(null);

const productValidator = Yup.object().shape({
    name: Yup.string().required().label("Nazwa"),
    code_toil: Yup.string().nullable().label("Kod TOiL"),
    group_code: Yup.string().nullable().label("Kod grupy"),
    group_name: Yup.string().nullable().label("Grupa produktowa"),
    code: Yup.string().nullable().label("Kod"),
    code_owu: Yup.string().required().label("Kod OWU"),
    is_subscriptions: Yup.bool().required().label("Czy produkt subskrypcyjny"),
    subscription_code: Yup.string().nullable().label("Kod subskrypcji"),
    subscription_status: Yup.string().nullable().label("Status subskrypcji"),
    subscription_date_from: Yup.date().nullable().label("Subskrypcja od"),
    subscription_date_to: Yup.date().nullable().label("Subskrypcja do"),
    kind: Yup.string().required().label("Rodzaj"),
    type: Yup.string().required().label("Typ"),
    partner_name: Yup.string().nullable().label("Nazwa partnera"),
    partner_code: Yup.string().nullable().label("Kod partnera"),
    insurer_min_age: Yup.number().nullable().label("Ubezpieczony wiek min"),
    insurer_max_age: Yup.number().nullable().label("Ubezpieczony wiek max"),
    insured_min_age: Yup.number().nullable().label("Ubierz wiek min"),
    insured_max_age: Yup.number().nullable().label("Ubierz wiek max"),
    period_of_insurance: Yup.number().nullable().label("Okres ubezpieczenia (msc)"),
    premium_type: Yup.string().nullable().label("Składka"),
    system_status: Yup.string().nullable().label("Status systemowy"),
    system_name: Yup.string().required().label("Nazwa systemu produktowego"),
    published_at: Yup.date().required().label("Data aktualizacji dokumentów"),
    is_archived: Yup.bool().required().label("Czy dokumenty archiwalne"),
});

let loading = ref(false);
let product = ref({
  name: '',
  code_toil: '',
  group_code: '',
  group_name: '',
  code: '',
  code_owu: '',
  is_subscriptions: 0,
  subscription_code: '',
  subscription_status: '',
  subscription_date_from: null,
  subscription_date_to: null,
  kind: '',
  type: '',
  partner_name: '',
  partner_code: '',
  insurer_min_age: null,
  insurer_max_age: null,
  insured_min_age: null,
  insured_max_age: null,
  period_of_insurance: null,
  premium_type: '',
  system_status: '',
  system_name: '',
  published_at: null,
  is_archived: 0,
});

if(typeof route.params.id != 'undefined') {
    store.dispatch("products/getProduct", route.params.id);
    product = computed(() => store.state.products.product.data);
    loading = computed(() => store.state.products.product.loading);
}

async function saveProduct() {
    if (submitButton.value) {
        submitButton.value.disabled = true;
        submitButton.value.setAttribute("data-kt-indicator", "on");
    }

    try {
        const res = await store.dispatch("products/saveProduct", product.value);
        router.push({ name: "ProductView", params: { id: res.data.data.id } });
    } catch(err) {

        if (submitButton.value) {
            submitButton.value.removeAttribute("data-kt-indicator");
            submitButton.value.disabled = false;
        }
    }
}
</script>
