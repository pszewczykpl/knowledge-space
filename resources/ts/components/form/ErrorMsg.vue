<template>
  <div class="fv-plugins-message-container">
    <div class="fv-help-block">
      <ErrorMessage :name="name" />
    </div>
  </div>
</template>

<script lang="ts" setup>
  import { ErrorMessage } from "vee-validate";

  defineProps<{
    name: string,
  }>();
</script>
