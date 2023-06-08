<template>
    <div v-if="loading">
        Ładowanie...
    </div>
    <Form
        class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
        novalidate="novalidate"
        @submit="saveFund()"
        :validation-schema="fundValidator"
    >
        <button ref="submitButton" type="submit" class="btn btn-lg btn-primary mb-5">
            <span class="indicator-label">Zapisz</span>
            <span class="indicator-progress">Proszę czekać...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>

        <FormPanel title="Dane podstawowe">

            <FormRow label="Nazwa" required>
                <Field type="text" name="name" v-model="fund.name" placeholder="Nazwa" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="name" />
            </FormRow>

            <FormRow label="Kod" required>
                <Field type="text" name="code" v-model="fund.code" placeholder="Kod" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="code" />
            </FormRow>

            <FormRow label="Typ" required>
                <Field type="text" name="type" v-model="fund.type" placeholder="Typ" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="type" />
            </FormRow>

            <FormRow label="Waluta">
                <Field type="text" name="currency" v-model="fund.currency" placeholder="Waluta" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="currency" />
            </FormRow>

            <FormRow label="Status">
                <Field type="text" name="status" v-model="fund.status" placeholder="Status" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="status" />
            </FormRow>

            <FormRow label="Data startu">
                <Field type="date" name="start_date" v-model="fund.start_date" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="start_date" />
            </FormRow>

        </FormPanel>

    </Form>
</template>

<script lang="ts" setup>
import {defineComponent, ref, onMounted, nextTick, computed} from "vue";
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
const fundValidator = Yup.object().shape({
    name: Yup.string().required().label("Nazwa"),
    code: Yup.string().required().label("Kod"),
    type: Yup.string().required().label("Typ"),
    currency: Yup.string().nullable().label("Waluta"),
    status: Yup.string().nullable().label("Status"),
    start_date: Yup.string().nullable().label("Data startu"),
});

let loading = ref(false);
let fund = ref({
    name: '',
    code: '',
    type: '',
    currency: '',
    status: '',
    start_date: '',
});

if(typeof route.params.id != 'undefined') {
    store.dispatch("funds/getFund", route.params.id);
    fund = computed(() => store.state.funds.fund.data);
    loading = computed(() => store.state.funds.fund.loading);
}

async function saveFund() {
    if (submitButton.value) {
        submitButton.value!.disabled = true;
        submitButton.value.setAttribute("data-kt-indicator", "on");
    }

    try {
        submitButton.value.removeAttribute("data-kt-indicator");
        submitButton.value.disabled = false;

        const res = await store.dispatch("funds/saveFund", fund.value);
        router.push({name: "Funds"});
    } catch (err) {

        if (submitButton.value) {
            submitButton.value.removeAttribute("data-kt-indicator");
            submitButton.value.disabled = false;
        }
    }
}

</script>
