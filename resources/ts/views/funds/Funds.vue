<template>
    <div v-if="loading">
        Ładowanie...
    </div>

    <SearchPanel>
        <template v-slot:title>
            <div class="d-flex align-items-center position-relative my-1">
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                <span class="svg-icon svg-icon-muted"><SearchIcon/></span>
            </span>
                <input type="text" v-model="search.global" @input="searchI()" class="form-control form-control-solid w-250px ps-15" placeholder="Szukaj..." />
            </div>
        </template>
        <template v-slot:toolbar>
            <div v-if="selectedIds.length === 0" class="d-flex justify-content-end">
                <router-link :to="{ name: 'FundCreate' }" class="btn btn-primary">
                    <span class="svg-icon svg-icon-muted svg-icon-1"><AddIcon/></span>
                    Dodaj fundusz
                </router-link>
            </div>
            <div v-else class="d-flex justify-content-end align-items-center">
                <div class="fw-bolder me-5">
                    <span class="me-2">{{ selectedIds.length }}</span>Zaznaczonych
                </div>
                <button type="button" class="btn btn-danger" @click="deleteElements()">Usuń zaznaczone</button>
            </div>
        </template>
        <template v-slot:default>
            <Datatable
                @on-sort="sort"
                @on-items-select="onItemSelect"
                :data="dataTable"
                :header="tableHeader"
                :enable-items-per-page-dropdown="true"
                :checkbox-enabled="true"
                checkbox-label="id"
            >
                <template v-slot:name="{ row: row }">
                    {{ row.name }}
                </template>
                <template v-slot:code="{ row: row }">
                    {{ row.code }}
                </template>
                <template v-slot:type="{ row: row }">
                    {{ row.type }}
                </template>
                <template v-slot:currency="{ row: row }">
                    {{ row.currency }}
                </template>
                <template v-slot:status="{ row: row }">
                    {{ row.status }}
                </template>
                <template v-slot:start_date="{ row: row }">
                    {{ row.start_date }}
                </template>
                <template v-slot:actions="{ row: row }">
                    <router-link
                        :to="{ name: 'FundUpdate', params: {id: row.id } }"
                        class="btn btn-light btn-sm btn-icon btn-active-light-primary me-2"
                    >
                        <span class="svg-icon svg-icon-muted svg-icon-3"><EditIcon/></span>
                    </router-link>
                    <a
                        class="btn btn-light btn-sm btn-icon btn-active-light-primary me-2"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end"
                        data-kt-menu-flip="top-end"
                    ><span class="svg-icon svg-icon-muted svg-icon-3"><ExpandIcon/></span>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" >
                        <div class="menu-item px-3"> <a @click="deleteElement(row.id)" class="menu-link px-3">Usuń</a> </div>
                    </div>
                </template>
            </Datatable>
        </template>
    </SearchPanel>
</template>

<script lang="ts" setup>
import {ref} from "vue";
import Datatable from "@/components/kt-datatable/KTDatatable.vue";
import { sort, useDataTable } from "@/core/services/DataTableService.ts";
import SearchPanel from "@/components/search/SearchPanel.vue";

import AddIcon from "@/components/svg/AddIcon.vue";
import SearchIcon from "@/components/svg/SearchIcon.vue";
import EditIcon from "@/components/svg/EditIcon.vue";
import ExpandIcon from "@/components/svg/ExpandIcon.vue";

const tableHeader = ref([
    { columnName: "Nazwa", columnLabel: "name", sortEnabled: true },
    { columnName: "Kod", columnLabel: "code", sortEnabled: true },
    { columnName: "Typ", columnLabel: "type", sortEnabled: true },
    { columnName: "Waluta", columnLabel: "currency", sortEnabled: true },
    { columnName: "Status", columnLabel: "status", sortEnabled: true },
    { columnName: "Data rozpoczęcia", columnLabel: "start_date", sortEnabled: true },
    { columnName: "Akcje", columnLabel: "actions", sortEnabled: false },
]);
const { loading, dataTable, initDataTable, selectedIds, search, onItemSelect, searchI, deleteElements, deleteElement } = useDataTable('funds', 'fund');

</script>
