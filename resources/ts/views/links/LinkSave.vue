<template>
    <div v-if="loading">
        Ładowanie...
    </div>
    <Form
            class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
            novalidate="novalidate"
            @submit="saveLink()"
            :validation-schema="linkValidator"
    >
        <button ref="submitButton" type="submit" class="btn btn-lg btn-primary mb-5">
            <span class="indicator-label">Zapisz</span>
            <span class="indicator-progress">Proszę czekać...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>

        <FormPanel title="Dane podstawowe">

            <FormRow label="Nazwa" required>
                <Field type="text" name="name" v-model="link.name" placeholder="Nazwa" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="name" />
            </FormRow>

            <FormRow label="Opis">
                <Field type="text" name="description" v-model="link.description" placeholder="Opis" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="description" />
            </FormRow>

            <FormRow label="URL">
                <Field type="text" name="url" v-model="link.url" placeholder="URL" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="url" />
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
const linkValidator = Yup.object().shape({
    name: Yup.string().required().label("Nazwa"),
    description: Yup.string().nullable().label("Opis"),
    url: Yup.string().required().label("URL"),
});

let loading = ref(false);
let link = ref({
    name: '',
    description: '',
    url: '',
});

if(typeof route.params.id != 'undefined') {
    store.dispatch("links/getLink", route.params.id);
    link = computed(() => store.state.links.link.data);
    loading = computed(() => store.state.links.link.loading);
}

async function saveLink() {
    if (submitButton.value) {
        submitButton.value!.disabled = true;
        submitButton.value.setAttribute("data-kt-indicator", "on");
    }

    try {
        const res = await store.dispatch("links/saveLink", link.value);
        router.push({name: "Links"});
    } catch (err) {

        if (submitButton.value) {
            submitButton.value.removeAttribute("data-kt-indicator");
            submitButton.value.disabled = false;
        }
    }
}

</script>
