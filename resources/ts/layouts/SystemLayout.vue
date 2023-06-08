<template>
  <div class="d-flex flex-column flex-root" id="kt_app_root">

    <router-view></router-view>

  </div>
</template>

<script lang="ts" setup>
  import { onMounted } from "vue";
  import { useStore } from "vuex";

  const store = useStore();

  onMounted(() => {
    store.dispatch('addBodyClassName', "app-blank");
    store.dispatch('addBodyClassName', "bgi-size-cover");
    store.dispatch('addBodyClassName', "bgi-position-center");
    store.dispatch('addBodyClassName', "bgi-no-repeat");
  });

</script>
