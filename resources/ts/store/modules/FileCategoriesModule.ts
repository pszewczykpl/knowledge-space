import axiosClient from "../../axios";
import { useToast } from "vue-toastification";

const toast = useToast();

export default {
    namespaced: true,
    state: () => ({
        fileCategories: {
            loading: false,
            data: [],
        },
        fileCategory: {
            loading: false,
            data: {},
        },
    }),
    getters: {
        //
    },
    actions: {
        getFileCategories({commit}) {
            commit('setFileCategoriesLoading', true)
            return axiosClient.get('/file-categories')
                .then((res) => {
                    commit("setFileCategories", res.data);
                    commit('setFileCategoriesLoading', false)
                    return res;
                });
        },
        getFileCategory({commit}, id) {
            commit("setFileCategoryLoading", true);
            return axiosClient
                .get(`/file-categories/${id}`)
                .then((res) => {
                    commit("setFileCategory", res.data);
                    commit("setFileCategoryLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setFileCategoryLoading", false);
                    throw err;
                });
        },
        saveFileCategory({commit}, fileCategory) {
            if (fileCategory.id) {
                return axiosClient
                    .put(`/file-categories/${fileCategory.id}`, fileCategory)
                    .then((res) => {
                        toast.success("Zaktualizowano Kategorię Plików!");
                        commit('setFileCategory', res.data)
                        return res;
                    });
            } else {
                return axiosClient
                    .post("/file-categories", fileCategory)
                    .then((res) => {
                        toast.success("Dodano Kategorię Plików!");
                        commit('setFileCategory', res.data)
                        return res;
                    });
            }
        },
        deleteFileCategory({commit}, id) {
            return axiosClient.delete(`/file-categories/${id}`)
                .then((res) => {
                    toast.error("Usunięto Kategorię Plików!");
                    return res;
                });
        },
    },
    mutations: {
        setFileCategoriesLoading: (state, loading) => {
            state.fileCategories.loading = loading;
        },
        setFileCategories: (state, fileCategories) => {
            state.fileCategories.data = fileCategories;
        },
        setFileCategoryLoading: (state, loading) => {
            state.fileCategory.loading = loading;
        },
        setFileCategory: (state, fileCategory) => {
            state.fileCategory.data = fileCategory;
        },
    },
}
