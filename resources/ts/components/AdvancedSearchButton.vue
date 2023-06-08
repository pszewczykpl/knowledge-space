<template>
    <a
            v-bind:class="{ active: isButtonActive }"
            @click="isButtonActive = !isButtonActive"
            id="search_box_panel_button"
            class="btn btn-link btn-color-muted mx-5 btn-active-color-primary"
            data-bs-toggle="collapse"
            :href="'#'+href"
            aria-expanded="true"
    >{{ searchButton(isButtonActive) }} Wyszukiwanie Zaawansowane</a>
</template>

<script lang="ts" setup>
import {ref} from "vue";

defineProps<{
    href: string
}>();

const isButtonActive = ref(false)
const searchButton = (bool: boolean) => { return bool ? 'Ukryj' : 'Pokaż' };
</script>
