<template>
    <router-view></router-view>
</template>

<script lang="ts" setup>
import { nextTick, onMounted } from "vue";
import { initializeComponents } from "@/assets/ts";

onMounted(() => {
    nextTick(() => {
        initializeComponents();
    });
});
</script>

<style lang="scss">
@import "../../node_modules/vue-toastification/dist/index.css";

// Main demo style scss
@import "assets/sass/plugins";
@import "assets/sass/style";

#app {
    display: contents;
}
</style>
