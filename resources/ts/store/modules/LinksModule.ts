import axiosClient from "../../axios";
import { useToast } from "vue-toastification";

const toast = useToast();

export default {
    namespaced: true,
    state: () => ({
        links: {
            loading: false,
            data: [],
        },
        link: {
            loading: false,
            data: {},
        },
    }),
    getters: {
        //
    },
    actions: {
        getLinks({commit}) {
            commit('setLinksLoading', true)
            return axiosClient.get('/links')
                .then((res) => {
                    commit("setLinks", res.data);
                    commit('setLinksLoading', false)
                    return res;
                });
        },
        getLink({commit}, id) {
            commit("setLinkLoading", true);
            return axiosClient
                .get(`/links/${id}`)
                .then((res) => {
                    commit("setLink", res.data);
                    commit("setLinkLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setLinkLoading", false);
                    throw err;
                });
        },
        saveLink({commit}, link) {
            if (link.id) {
                return axiosClient
                    .put(`/links/${link.id}`, link)
                    .then((res) => {
                        toast.success("Zaktualizowano Link!");
                        commit('setLink', res.data)
                        return res;
                    });
            } else {
                return axiosClient
                    .post("/links", link)
                    .then((res) => {
                        toast.success("Dodano Link!");
                        commit('setLink', res.data)
                        return res;
                    });
            }
        },
        deleteLink({commit}, id) {
            return axiosClient.delete(`/links/${id}`)
                .then((res) => {
                    toast.error("Usunięto Link!");
                    return res;
                });
        },
    },
    mutations: {
        setLinksLoading: (state, loading) => {
            state.links.loading = loading;
        },
        setLinks: (state, links) => {
            state.links.data = links;
        },
        setLinkLoading: (state, loading) => {
            state.link.loading = loading;
        },
        setLink: (state, link) => {
            state.link.data = link;
        },
    },
}
