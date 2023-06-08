<template>
  <div v-if="loading">
    Ładowanie...
  </div>
  <div class="d-flex flex-column flex-xl-row">
    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
      <Summary title="Podsumowanie">
        <SummaryRow
            title="Szczegóły produktu"
            :details="{
              'Nazwa': product.name,
              'TOiL': product.code_toil,
              'OWU': product.code_owu,
              'Kod': product.code,
              'Grupa': product.group_code,
              'Rodzaj': product.kind,
              'Typ': product.type,
            }"
        />
      </Summary>
    </div>
    <div class="flex-lg-row-fluid ms-lg-15">
      <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
        <li class="nav-item">
          <router-link
              :to="{ name: 'ProductView', params: { id: route.params.id }}"
              :class="{ active: hasActive('/') }"
              class="nav-link text-active-primary pb-4"
          >Informacje</router-link>
        </li>
        <li class="nav-item">
          <router-link
              :to="{ name: 'ProductViewFiles', params: { id: route.params.id } }"
              :class="{ active: hasActive('/files') }"
              class="nav-link text-active-primary pb-4"
          >Dokumenty</router-link>
        </li>
        <li class="nav-item ms-auto">
<!--          <a-->
<!--              href="#"-->
<!--              class="btn btn-primary ps-7"-->
<!--              data-kt-menu-trigger="click"-->
<!--              data-kt-menu-attach="parent"-->
<!--              data-kt-menu-placement="bottom-end"-->
<!--          >-->
<!--              Actions<span class="svg-icon svg-icon-muted svg-icon-1"><EditIcon /></span>-->

<!--          </a>-->
        </li>
      </ul>
      <div>
        <div>
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import {ref, onMounted, onBeforeMount, onUpdated, nextTick, ComputedRef} from "vue";
  import store from "@/store";
  import { computed, watch } from "vue";
  import { useRoute, useRouter } from "vue-router";
  import {reinitializeComponents} from "@/assets/ts";
  import Summary from "@/components/summary/Summary.vue";
  import SummaryRow from "@/components/summary/SummaryRow.vue";
import {Product} from "@/core/types/Product";
import EditIcon from "@/components/svg/EditIcon.vue";

  const route = useRoute();
  const product: ComputedRef<Product> = computed(() => store.state.products.product.data);
  const loading = computed(() => store.state.products.product.loading);

  onMounted(() => {
    store.dispatch("products/getProduct", route.params.id);
  });

  const tabs = [{
    name: 'Informacje',
    routeName: 'ProductView',
    routePath: ''
  }];

  const hasActive = (match) => {
    let routes:string;

    if(String(route.path).includes('/files')) {
      routes = '/files';
    } else if(String(route.path).includes('/funds')) {
      routes = '/funds';
    } else {
      routes = '/';
    }

    if(match === routes) return true;
  };

</script>
