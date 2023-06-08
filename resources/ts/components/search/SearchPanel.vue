<template>
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <slot name="title"></slot>
                <AdvancedSearchButton v-if="search" href="search_panel"/>
            </div>
            <div class="card-toolbar">
                <slot name="toolbar"></slot>
            </div>
        </div>
        <div class="card-body pt-0 p-0 m-0">
            <div class="mb-1">
                <div v-if="search" class="collapse" id="search_panel">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="separator separator-dashed mt-6 mb-6"></div>
                        </div>
                        <div class="col-12" style="padding: 0 30px 0 30px">
                            <div class="row g-8 mb-4">
                                <slot name="search"></slot>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <slot></slot>
        </div>
    </div>
</template>

<script lang="ts" setup>
import AdvancedSearchButton from "@/components/AdvancedSearchButton.vue";

defineProps<{
    search?: boolean
}>();

</script>
