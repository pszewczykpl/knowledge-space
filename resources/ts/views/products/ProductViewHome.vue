<template>
  <Details title="Szczegóły produktu">
    <template v-slot:toolbar>
      <router-link
          :to="{ name: 'ProductUpdate', params: { id: route.params.id } }"
          v-if="isAdmin"
          class="btn btn-sm btn-light-primary">
          <span class="svg-icon svg-icon-muted svg-icon-3"><EditIcon /></span>Edytuj</router-link>
    </template>
    <template v-slot:default>
      <DetailsRow
          title="Podstawowe informacje"
          :details="[
            { label: 'Nazwa', value: product.name },
            { label: 'Rodzaj', value: getProductKind() },
            { label: 'Kod TOiL', value: product.code_toil },
            { label: 'Typ', value: getProductType() },
            { label: 'Kod OWU', value: product.code_owu },
            { label: 'Składka', value: getPremiumType() },
            { label: 'Kod produktu', value: product.code },
            { label: 'Okres ubezpieczenia', value: product.period_of_insurance },
            { label: 'Kod grupy', value: product.group_code },
            { label: 'Grupwa produktowa', value: product.group_name },
            { label: 'Partner', value: product.partner_name },
            { label: 'Kod partnera', value: product.partner_code },
            { label: 'System produktowy', value: product.system_name },
            { label: 'Status wdrożenia', value: product.system_status },
          ]"
      />
      <DetailsRow
          title="Ubezpieczający"
          :details="[
            { label: 'Minimalny wiek', value: product.insurer_min_age },
            { label: 'Maksymalny wiek', value: product.insurer_max_age },
          ]"
      />
      <DetailsRow
          title="Ubezpieczony"
          :details="[
            { label: 'Minimalny wiek', value: product.insured_min_age },
            { label: 'Maksymalny wiek', value: product.insured_max_age },
          ]"
      />
      <DetailsRow
          v-if="product.is_subscriptions"
          title="Subskrypcja"
          description="Ten produkt jest produktem subskrypcyjnym."
          :details="[
            { label: 'Kod', value: product.subscription_code },
            { label: 'Status', value: product.subscription_status },
            { label: 'Data od', value: product.subscription_date_from },
            { label: 'Data do', value: product.subscription_date_to },
          ]"
      />
    </template>
  </Details>
</template>

<script lang="ts" setup>
  import DetailsRow from "@/components/details/DetailsRow.vue";
  import Details from "@/components/details/Details.vue";
  import {computed, ComputedRef} from "vue";
  import store from "@/store";
  import {useRoute} from "vue-router";
  import EditIcon from "@/components/svg/EditIcon.vue";
  import {isAdmin} from "@/core/services/AuthService";

  const route = useRoute();

  interface Product {
      id: number;
      code_toil: string;
      group_code: string;
      group_name: string;
      name: string;
      code: string;
      code_owu: string;
      is_subscriptions: number;
      subscription_code: string;
      subscription_status: string;
      subscription_date_from: string;
      subscription_date_to: string;
      kind: string;
      type: string;
      partner_name: string;
      partner_code: string;
      insurer_min_age: number;
      insurer_max_age: number;
      insured_min_age: number;
      insured_max_age: number;
      period_of_insurance: string;
      premium_type: string;
      system_status: string;
      system_name: string;
      published_at: string;
      is_archived: number;
      created_by: any;
      created_at: string;
      updated_at: string;
  }

  const product: ComputedRef<any> = computed(() => store.state.products.product.data);

  function getProductKind(): string {
      if (product.value.kind === 'I') {
          return 'Inwestycyjny';
      } else if (product.value.kind === 'P') {
          return 'Ochronny';
      } else if (product.value.kind === 'E') {
          return 'Pracowniczy';
      } else if (product.value.kind === 'B') {
          return 'Bancassurance';
      } else {
          return '';
      }
  }

  function getProductType(): string {
      if (product.value.type === 'I') {
          return 'Indywidualny';
      } else if (product.value.type === 'G') {
          return 'Grupowy';
      } else {
          return '';
      }
  }

  function getPremiumType(): string {
      if (product.value.premium_type === 'R') {
          return 'Regularna';
      } else if (product.value.premium_type === 'S') {
          return 'Jednorazowa';
      } else {
          return '';
      }
  }


</script>
