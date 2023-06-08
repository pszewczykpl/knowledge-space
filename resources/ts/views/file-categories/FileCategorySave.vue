<template>
    <div v-if="loading">
        Ładowanie...
    </div>
    <Form
            class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework"
            novalidate="novalidate"
            @submit="saveFileCategory()"
            :validation-schema="fileCategoryValidator"
    >
        <button ref="submitButton" type="submit" class="btn btn-lg btn-primary mb-5">
            <span class="indicator-label">Zapisz</span>
            <span class="indicator-progress">Proszę czekać...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>

        <FormPanel title="Dane podstawowe">

            <FormRow label="Nazwa" required>
                <Field type="text" name="name" v-model="fileCategory.name" placeholder="Nazwa" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="name" />
            </FormRow>

            <FormRow label="Prefix">
                <Field type="text" name="prefix" v-model="fileCategory.prefix" placeholder="Prefix" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                <ErrorMsg name="description" />
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
const fileCategoryValidator = Yup.object().shape({
    name: Yup.string().required().label("Nazwa"),
    prefix: Yup.string().nullable().label("Prefix"),
});

let loading = ref(false);
let fileCategory = ref({
    name: '',
    prefix: '',
});

if(typeof route.params.id != 'undefined') {
    store.dispatch("fileCategories/getFileCategory", route.params.id);
    fileCategory = computed(() => store.state.fileCategories.fileCategory.data);
    loading = computed(() => store.state.fileCategories.fileCategory.loading);
}

async function saveFileCategory() {
    if (submitButton.value) {
        submitButton.value!.disabled = true;
        submitButton.value.setAttribute("data-kt-indicator", "on");
    }

    try {
        submitButton.value.removeAttribute("data-kt-indicator");
        submitButton.value.disabled = false;

        const res = await store.dispatch("fileCategories/saveFileCategory", fileCategory.value);
        router.push({name: "FileCategories"});
    } catch (err) {
        if (submitButton.value) {
            submitButton.value.removeAttribute("data-kt-indicator");
            submitButton.value.disabled = false;
        }
    }
}

</script>
