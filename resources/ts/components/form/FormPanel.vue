<template>
  <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">{{ title }}</h3>
      </div>
    </div>
    <div class="card-body border-top p-9">

      <slot></slot>

    </div>
  </div>
</template>

<script lang="ts" setup>
  defineProps<{
    title: string,
  }>();
</script>
