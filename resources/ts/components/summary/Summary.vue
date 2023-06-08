<template>
  <div class="card mb-5 mb-xl-8">
    <div class="card-header">
      <div class="card-title">
        <h2>{{ title }}</h2>
      </div>
    </div>
    <div class="card-body pt-0 fs-6">
      <slot></slot>
    </div>
  </div>
</template>

<script lang="ts" setup>
  defineProps<{
    title: string,
  }>()
</script>
