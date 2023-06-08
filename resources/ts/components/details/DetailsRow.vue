<template>
  <div class="mb-6">
    <h5 class="mb-2">{{ title }}</h5>
    <div class="mb-2" v-if="description">{{ description }}</div>
    <div class="d-flex flex-wrap">
      <div class="flex-equal">
        <div class="row fs-6 fw-semibold gs-0 gy-2 gx-2 m-0 align-items-start">
          <div class="col-md-6 d-flex my-2" v-for="detail in details">
            <div class="text-gray-400 w-150px align-self-start">{{ detail.label }}</div>
            <div class="text-gray-800 align-self-start">{{ detail.value }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
  defineProps<{
    title?: string,
    description?: string,
    details: any,
  }>()
</script>
