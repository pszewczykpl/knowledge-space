<template>
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex flex-column flex-center text-center p-10">
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">
                    <h1 class="fw-bolder fs-2qx text-gray-900 mb-4">Błąd systemu</h1>
                    <div class="fw-semibold fs-6 text-gray-500 mb-7">
                        Coś poszło nie tak! Spróbuj ponownie później.
                    </div>
                    <div class="mb-11">
                        <img
                                src="../../../../public/media/auth/500-error.png"
                                class="mw-100 mh-300px theme-light-show"
                                alt=""
                        />
                        <img
                                src="../../../../public/media/auth/500-error-dark.png"
                                class="mw-100 mh-300px theme-dark-show"
                                alt=""
                        />
                    </div>
                    <div class="mb-0">
                        <router-link to="/" class="btn btn-sm btn-primary"
                        >Powrót do strony głównej</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { computed, onMounted } from "vue";
import { useStore } from "vuex";

const store = useStore();

const themeMode = computed(() => store.getters.layoutConfig("general.mode"));
const bgImage = themeMode.value !== "dark" ? "bg7.jpg" : "bg7-dark.jpg";

onMounted(() => {
    document.body.className = "";
    for (const attribute of document.body.attributes) {
        document.body.removeAttributeNode(attribute);
    }

    store.dispatch("addBodyClassName", "bg-body");
    store.dispatch("addBodyAttribute", {
        qualifiedName: "style",
        value: `background-image: url("media/auth/${bgImage}")`,
    });
});
</script>
