<template>
  <div>
    <Details title="Dokumenty">
      <template v-slot:toolbar>
<!--        <span @click="toCheck = !toCheck" class="btn btn-light-success font-weight-bold btn-flex btn-sm ms-2 card-rounded">-->
<!--          &lt;!&ndash;                @include('svg.zip', ['class' => 'svg-icon svg-icon-3'])&ndash;&gt;-->
<!--          Pobierz jako .zip-->
<!--        </span>-->
        <router-link
            :to="{name: 'FileCreate' }"
            v-if="isAdmin"
            class="btn btn-light-primary font-weight-bold btn-flex btn-sm ms-2 card-rounded">
          <span class="svg-icon svg-icon-3"><AddIcon /></span>
            Dodaj dokument
        </router-link>
      </template>
      <template v-slot:default>
        <div v-if="loading">
          Ładowanie...
        </div>
        <div class="row">
          <div class="col-12">

            <div class="d-inline-flex">
              <div class="d-flex align-items-center position-relative">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/>
                  </svg>
                </span>
                <input
                    type="text"
                    v-model="search.global"
                    @input="searchFnc()"
                    placeholder="Wyszukaj dokumentów..."
                    class="form-control form-control-sm card-rounded ps-15"
                    style="width: 250px; display: inline-flex; border-style: dashed; border-color: #5E6278;"
                />
              </div>
            </div>

            <a class="btn btn-outline btn-outline-dashed btn-outline-info font-weight-bold btn-flex btn-sm ms-2 card-rounded"
               @click="showDraft()"
               :class="{'active': search.draft !== '0' }"
            >
              Pokaż robocze
            </a>
<!--            <a @click="dupa()" class="btn btn-outline btn-outline-dashed btn-outline-info  btn-active-light-info  font-weight-bold btn-flex btn-sm ms-2 card-rounded">-->
<!--              Pokaż tylko produktowe-->
<!--            </a>-->

          </div>
        </div>
        <div class="row mb-10">
          <div v-for="(value, index) in file_categories()" class="col-md-6">
            <div>

              <div v-for="(file_category, index_f) in value">
                <div v-if="files.filter(file => file.file_category.name == file_category).length > 0">
                  <div class="card card-custom shadow-none p-0 m-0">
                    <div class="card-header border-0 p-0 m-0 min-h-60px">
                      <h3 class="card-title fw-bold">{{ file_category }}</h3>
                      <div class="card-toolbar">
                        <a href="#" class="btn btn-link btn-color-primary btn-active-color-primary btn-sm" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz poniższe dokumenty jako <b>.zip</b>">
                          <!--                          @include('svg.zip', ['class' => 'navi-icon'])Pobierz .zip-->
                        </a>
                      </div>
                    </div>
                    <div class="card-body p-0 m-0">
                      <div v-for="file in files.filter(file => file.file_category.name == file_category)">
                        <div class="mb-2">
                          <div class="d-flex align-items-center cursor-pointer">
                            <div v-if="toCheck">
                              <div class="form-check form-check-sm form-check-custom form-check-solid me-3"><input class="form-check-input" type="checkbox" :name="file.id.toString()" :value="file.id" :id="file.id.toString()"></div>
                            </div>
                              <div @click="openFile(file)" class="me-3">
                              <img :src="'/media/svg/files/' + file.extension + (themeMode === 'light' ? '' : '-dark') + '.svg'" style="width: 35px;" />
                            </div>
                            <div @click="openFile(file)" class="d-flex flex-column flex-grow-1">
                                  <span class="fs-7 fw-normal text-gray-800 mt-auto">
                                    {{ file.name }}
                                  </span>
                              <span class="fs-7 fw-normal text-gray-400 mt-auto">
                                    Data ostatniej edycji: {{ new Date(file.updated_at).toLocaleDateString() }}
                                  </span>
                            </div>

                            <div class="my-0">
<!--                              <button type="button" class="btn btn-sm btn-icon btn-active-light card-rounded" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">-->
<!--                                                <span class="svg-icon svg-icon-1">-->
<!--                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
<!--                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />-->
<!--                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />-->
<!--                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />-->
<!--                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />-->
<!--                                                        </g>-->
<!--                                                    </svg>-->
<!--                                                </span>-->
<!--                              </button>-->
<!--                              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3 card-rounded" data-kt-menu="true">-->
<!--                                <div v-if="file.extension === 'pdf'" class="menu-item px-3 my-1">-->
<!--                                  <a @click="openFile(file)" class="menu-link card-rounded px-3">Wyświetl</a>-->
<!--                                </div>-->
<!--                                <div class="menu-item px-3 my-1">-->
<!--                                  <a @click="downloadFile(file.id)" class="menu-link px-3 card-rounded" target="_blank">Pobierz</a>-->
<!--                                </div>-->
<!--                                <div class="separator mt-3 opacity-75 mb-3"></div>-->
<!--                                <div class="menu-item px-3 my-1">-->
<!--                                  <a href="" class="menu-link px-3 card-rounded">Edytuj</a>-->
<!--                                </div>-->
<!--                                <div class="menu-item px-3 my-1">-->
<!--                                  &lt;!&ndash;                                          <a href="{{ route('files.replace', ['file' => $file, 'fileable_type' => $type, 'fileable_id' => $id]) }}" class="menu-link px-3 card-rounded">Zastąp</a>&ndash;&gt;-->
<!--                                </div>-->
<!--                                <div class="menu-item px-3 my-1">-->
<!--                                  &lt;!&ndash;                                          <a href="{{ route('files.detach', ['file' => $file, 'fileable_type' => $type, 'fileable_id' => $id]) }}" class="menu-link px-3 card-rounded">Odepnij</a>&ndash;&gt;-->
<!--                                </div>-->
<!--                                <div class="menu-item px-3 my-1">-->
<!--                                  &lt;!&ndash;                                          <a onclick='document.getElementById("file_destroy_{{ $file->id }}").submit();' class="menu-link px-3 card-rounded">Usuń</a>&ndash;&gt;-->
<!--                                  &lt;!&ndash;                                          {{ Form::open([ 'method'  => 'delete', 'route' => [ 'files.destroy', $file->id ], 'id' => 'file_destroy_' . $file->id ]) }}{{ Form::close() }}&ndash;&gt;-->
<!--                                </div>-->
<!--                              </div>-->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>
    </Details>
  </div>
</template>

<script lang="ts" setup>
  import Details from "@/components/details/Details.vue";
  import {ref, onMounted, onBeforeMount, onUpdated, nextTick} from "vue";
  import store from "@/store";
  import { computed, watch } from "vue";
  import { useRoute, useRouter } from "vue-router";
  import {reinitializeComponents} from "@/assets/ts";
  import AddIcon from "@/components/svg/AddIcon.vue";
  import { searchItems } from "@/core/services/DataTableService.ts";
  import {isAdmin} from "@/core/services/AuthService";

  let toCheck = ref(false);


  const searchFnc = () => searchItems(files.value, initFiles.value, search.value);
  const files = computed(() => store.state.products.product.files.data);
  const loading = computed(() => store.state.products.product.files.loading);
  let initFiles :any = ref([]);

  const layout = computed(() => {
    return store.getters.layoutConfig("general.layout");
  });

  const themeMode = computed(() => {
    return store.getters.getThemeMode;
  });

  const url = import.meta.env.VITE_BASE_URL;
  const api_url = import.meta.env.VITE_API_BASE_URL;
  const route = useRoute();

  const dupa = () => {
    files.value.reverse();
    initFiles.value.reverse();
  }

  const file_categories = () => {

    const file_categories_all: Array<string> = [];
    files.value.forEach((file) => {
      const name: string = file.file_category.name;
      if(!file_categories_all.includes(name)) {
        file_categories_all.push(name);
      }
    });

    file_categories_all.sort().reverse();
    const half = Math.ceil(file_categories_all.length / 2);
    const product = file_categories_all;
    return [product.slice(0, half), product.slice(half)];

  };

  const openFile = (file) => {
      let url = api_url + `/api/files/${file.id}`;
      window.open(url, '_blank');
  };

  onMounted(() => {
    store
        .dispatch("products/getProductFiles", route.params.id)
        .then(() => {
          initFiles.value.splice(0, files.value.length, ...files.value);
          reinitializeComponents();
            searchFnc();
        })
  });

  const search = ref<{
    global: string,
    draft: string,
  }>({
    global: '',
    draft: '0',
  });

  const showDraft = () => {
    files.value.splice(0, files.value.length, ...initFiles.value);
    search.value['draft'] = search.value['draft'] === '' ? '0' : '';
      searchFnc();
  };



</script>
