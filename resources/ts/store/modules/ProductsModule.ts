import axiosClient from "../../axios";
import { useToast } from "vue-toastification";

const toast = useToast();

export default {
    namespaced: true,
    state: () => ({
        products: {
            loading: false,
            data: [],
        },
        product: {
            loading: false,
            data: {},
            files: {
                loading: false,
                data: [],
            },
            comments: {
                loading: false,
                data: [],
            },
        },
    }),
    getters: {
        //
    },
    actions: {
        getProducts({commit}) {
            commit('setProductsLoading', true)
            return axiosClient.get('/products')
                .then((res) => {
                    commit("setProducts", res.data);
                    commit('setProductsLoading', false)
                    return res;
                });
        },
        getProduct({commit}, id) {
            commit("setProductLoading", true);
            return axiosClient
                .get(`/products/${id}`)
                .then((res) => {
                    commit("setProduct", res.data);
                    commit("setProductLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setProductLoading", false);
                    throw err;
                });
        },
        getProductFiles({commit}, id) {
            commit("setProductFilesLoading", true);
            return axiosClient
                .get(`/products/${id}/files`)
                .then((res) => {
                    commit("setProductFiles", res.data);
                    commit("setProductFilesLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setProductFilesLoading", false);
                    throw err;
                });
        },
        getProductComments({commit}, id) {
            commit("setProductFilesLoading", true);
            return axiosClient
                .get(`/products/${id}/comments`)
                .then((res) => {
                    commit("setProductComments", res.data);
                    commit("setProductCommentsLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setProductCommentsLoading", false);
                    throw err;
                });
        },
        saveProduct({commit}, product) {
            if (product.id) {
                return axiosClient
                    .put(`/products/${product.id}`, product)
                    .then((res) => {
                        toast.success("Zaktualizowano Ubezpieczenie!");
                        commit('setProduct', res.data)
                        return res;
                    });
            } else {
                return axiosClient
                    .post("/products", product)
                    .then((res) => {
                        toast.success("Dodano Ubezpieczenie!");
                        commit('setProduct', res.data)
                        return res;
                    });
            }
        },
        deleteProduct({commit}, id) {
            return axiosClient.delete(`/products/${id}`)
                .then((res) => {
                    toast.error("Usunięto Ubezpieczenie!");
                    return res;
                });
        },
        // saveSurveyAnswer({commit}, {surveyId, answers}) {
        //     return axiosClient.post(`/survey/${surveyId}/answer`, {answers});
        // },
    },
    mutations: {
        setProductsLoading: (state, loading) => {
            state.products.loading = loading;
        },
        setProducts: (state, products) => {
            state.products.data = products;
        },
        setProductLoading: (state, loading) => {
            state.product.loading = loading;
        },
        setProduct: (state, product) => {
            state.product.data = product;
        },
        setProductFilesLoading: (state, loading) => {
            state.product.files.loading = loading;
        },
        setProductFiles: (state, files) => {
            state.product.files.data = files;
        },
        setProductCommentsLoading: (state, loading) => {
            state.product.comments.loading = loading;
        },
        setProductComments: (state, files) => {
            state.product.comments.data = files;
        },
    },
}
