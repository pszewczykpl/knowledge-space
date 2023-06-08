<template>
  <div class="card card-flush pt-3 mb-5 mb-xl-10">
    <div class="card-header">
      <div class="card-title">
        <h2>{{ title }}</h2>
      </div>
      <div class="card-toolbar">
        <slot name="toolbar"></slot>
      </div>
    </div>
    <div class="card-body pt-3">
      <slot></slot>
    </div>
  </div>
</template>

<script lang="ts" setup>
  defineProps<{
    title: string,
  }>()
</script>
