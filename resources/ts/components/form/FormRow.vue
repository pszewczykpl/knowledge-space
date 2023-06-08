<template>
  <div class="row mb-6">
    <label class="col-lg-3 col-form-label fw-semobold fs-6" :class="{required: required}">{{ label }}</label>
    <div class="col-lg-9">
      <div class="row">
        <div class="col-lg-12 fv-row">

          <slot></slot>

        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
  defineProps<{
    label: string,
    required?: boolean
  }>();
</script>
