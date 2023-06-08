<template>
    <div v-if="loading">
        Ładowanie...
    </div>

    <SearchPanel search>
        <template v-slot:title>
            <div class="d-flex align-items-center position-relative my-1">
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                <span class="svg-icon svg-icon-muted"><SearchIcon/></span>
            </span>
                <input type="text" v-model="search.global" @input="searchI()" class="form-control form-control-solid w-250px ps-15" placeholder="Szukaj..." />
            </div>
        </template>
        <template v-slot:search>
            <div class="col-lg-3" v-for="item in searchDefinition">
                <div class="d-flex align-items-center position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6"><SearchIcon/></span>
                    <input type="text" v-model="search[item.code]" @input="searchI()" class="form-control form-control-solid ps-15" :placeholder="item.name"/>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="nav-group nav-group-fluid">
                    <label>
                        <input type="radio" class="btn-check" name="type" checked>
                        <span @click="selectProductType('')" class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Wszystkie</span>
                    </label>
                    <label>
                        <input type="radio" class="btn-check" name="type" value="users">
                        <span @click="selectProductType('Indywidualny')" class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Indywidualne</span>
                    </label>
                    <label>
                        <input type="radio" class="btn-check" name="type" value="orders">
                        <span @click="selectProductType('Grupowy')" class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Grupowe</span>
                    </label>
                </div>
            </div>
        </template>
        <template v-slot:toolbar>
            <div v-if="selectedIds.length === 0" class="d-flex justify-content-end">
                <router-link :to="{ name: 'ProductCreate' }" class="btn btn-primary">
                    <span class="svg-icon svg-icon-muted svg-icon-1"><AddIcon/></span>
                    Dodaj produkt
                </router-link>
            </div>
            <div v-else class="d-flex justify-content-end align-items-center">
                <div class="fw-bolder me-5">
                    <span class="me-2">{{ selectedIds.length }}</span>Zaznaczonych
                </div>
                <button
                    type="button"
                    class="btn btn-danger"
                    @click="deleteElements()"
                    v-if="isAdmin"
                >Usuń zaznaczone</button>
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
                    :loading="loading"
            >
                <template v-slot:name="{ row: row }">
                    <router-link
                            :to="{ name: 'ProductView', params: {id: row.id } }"
                            class="text-gray-600 text-hover-primary mb-1"
                    >{{ row.name }}
                    </router-link>
                </template>
                <template v-slot:code_toil="{ row: row }"> {{ row.code_toil }} </template>
                <template v-slot:code="{ row: row }"> {{ row.code }} </template>
                <template v-slot:partner_name="{ row: row }"> <div class="badge badge-light-success fw-bold badge-lg">{{ row.partner_code }}</div> {{ row.partner_name }} </template>
                <template v-slot:group_code="{ row: row }"> {{ row.group_code }} </template>
                <template v-slot:kind="{ row: row }"> <div class="badge badge-light-success fw-bold badge-lg">{{ row.kind }}</div> </template>
                <template v-slot:actions="{ row: row }">
                    <router-link
                            :to="{ name: 'ProductView', params: {id: row.id } }"
                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                    >
                        <span class="svg-icon svg-icon-muted svg-icon-3"><ViewIcon/></span>Wyświetl
                    </router-link>
                    <router-link
                            :to="{ name: 'ProductUpdate', params: {id: row.id } }"
                            class="btn btn-light btn-sm btn-icon btn-active-light-primary me-2"
                    >
                        <span class="svg-icon svg-icon-muted svg-icon-3"><EditIcon/></span>
                    </router-link>
                    <a
                            class="btn btn-light btn-sm btn-icon btn-active-light-primary"
                            v-if="isAdmin"
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
import {computed, ComputedRef, Ref, ref} from "vue";
import Datatable from "@/components/kt-datatable/KTDatatable.vue";
import store from "@/store";
import arraySort from "array-sort";
import {reinitializeComponents} from "@/assets/ts";
import AddIcon from "@/components/svg/AddIcon.vue";
import SearchIcon from "@/components/svg/SearchIcon.vue";
import ViewIcon from "@/components/svg/ViewIcon.vue";
import EditIcon from "@/components/svg/EditIcon.vue";
import ExpandIcon from "@/components/svg/ExpandIcon.vue";
import { useDataTable } from "@/core/services/DataTableService.ts";
import {Product} from "@/core/types/Product";
import SearchPanel from "@/components/search/SearchPanel.vue";
import {isAdmin} from "@/core/services/AuthService";
import {Sort} from "@/components/kt-datatable/table-partials/models.ts";

const tableHeader = ref([
    { columnName: "Nazwa produktu",   columnLabel: "name",         sortEnabled: true, columnWidth: 300 },
    { columnName: "Kod TOiL",         columnLabel: "code_toil",    sortEnabled: true  },
    { columnName: "Kod produktu",     columnLabel: "code",         sortEnabled: true  },
    { columnName: "Dystrybutor",      columnLabel: "partner_name", sortEnabled: true  },
    { columnName: "Grupa produktowa", columnLabel: "group_code",   sortEnabled: true  },
    { columnName: "Rodzaj",           columnLabel: "kind",         sortEnabled: true  },
    { columnName: "Akcje",            columnLabel: "actions",      sortEnabled: false },
]);
const searchDefinition = [
    { name: 'Nazwa produktu',   code: 'name'},
    { name: 'Kod TOiL',         code: 'code_toil'},
    { name: 'Kod OWU',          code: 'code_owu'},
    { name: 'Kod produktu',     code: 'code'},
    { name: 'Grupa produktowa', code: 'group_code'},
    { name: 'Nazwa partnera',   code: 'partner_name'},
    { name: 'Kod partnera',     code: 'partner_code'},
];
const { loading, dataTable, initDataTable, selectedIds, search, onItemSelect, searchI, deleteElements, deleteElement, sort } = useDataTable('products', 'product', searchDefinition);



const selectProductType = (type: string) => {
  search.value['type'] = type;
    searchI()
};

</script>
