<template>
  <div class="mb-7 mt-7">
    <h5 class="mb-4">{{ title }}</h5>
    <table class="table fs-6 gs-0 gy-2 gx-2">
      <tbody>
        <tr v-for="(value, key) in details">
          <td class="text-gray-400 w-25">{{ key }}</td>
          <td class="text-gray-800">{{ value }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script lang="ts" setup>
  defineProps<{
    title: string,
    details: any,
  }>()
</script>
