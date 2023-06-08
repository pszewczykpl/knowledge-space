import {reinitializeComponents} from "@/assets/ts";
import {Sort} from "@/components/kt-datatable/table-partials/models";
import arraySort from "array-sort";
import { ref, computed, ComputedRef } from 'vue';
import store from '@/store';

export function searchingFunc (obj: object, value: string, keys: string|boolean) {
    for (let key in obj) {
        if (!(typeof obj[key] === "object")) {
            if(keys == 'global' || keys == key) {
                if (String(obj[key]).toLowerCase().trim().includes(String(value).toLowerCase().trim())) {
                    return true;
                }
            }
        }
    }
    return false;
}

export function searchItems (tableData: any[], initData: any[], search: object) {
    tableData.splice(0, tableData.length, ...initData);
    for (let key in search) {
        if (search[key] != '') {
            let results: any = [];
            for (let j = 0; j < tableData.length; j++) {
                if (searchingFunc(tableData[j], search[key], key)) {
                    results.push(tableData[j]);
                }
            }
            tableData.splice(0, tableData.length, ...results);
        }
    }
    reinitializeComponents();
}

export function useDataTable(dataType: string, model: string, searchDefinition: Array<{name: string, code: string}> = []) {
    const loading = computed(() => store.state[dataType][dataType].loading);
    const dataTable: ComputedRef<Array<any>> = computed(() => store.state[dataType][dataType].data);
    const initDataTable = ref<Array<any>>([]);
    const selectedIds = ref<Array<number>>([]);

    const search = ref<{ [key: string]: string }>({});
    search.value['global'] = '';
    searchDefinition.forEach((item) => (search.value[item.code] = ''));

    const onItemSelect = (selectedItems: Array<number>) => (selectedIds.value = selectedItems);
    const searchI = () => searchItems(dataTable.value, initDataTable.value, search.value);

    store
        .dispatch(`${dataType}/get${dataType.charAt(0).toUpperCase() + dataType.slice(1)}`)
        .then(() => {
            initDataTable.value.splice(0, dataTable.value.length, ...dataTable.value);
            searchI();
        });

    const deleteElements = () => {
        selectedIds.value.forEach((item) => {
            deleteElement(item);
        });
        selectedIds.value.length = 0;
    };

    const deleteElement = (id) => {
        for (let i = 0; i < dataTable.value.length; i++) {
            if (dataTable.value[i].id === id) {
                dataTable.value.splice(i, 1);
                store
                    .dispatch(`${dataType}/delete${model.charAt(0).toUpperCase() + model.slice(1)}`, id)
                    .then(() => {
                        initDataTable.value.splice(0, dataTable.value.length, ...dataTable.value);
                    });
            }
        }
        reinitializeComponents();
    };

    const sort = (sort: Sort) => {
        const reverse: boolean = sort.order === "asc";
        if (sort.label) {
            arraySort(dataTable.value, sort.label, { reverse });
        }
    }

    return { loading, dataTable, initDataTable, selectedIds, search, onItemSelect, searchI, deleteElements, deleteElement, sort };
}
