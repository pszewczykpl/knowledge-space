import axiosClient from "../../axios";
import { useToast } from "vue-toastification";

const toast = useToast();

export default {
    namespaced: true,
    state: () => ({
        users: {
            loading: false,
            data: [],
        },
        user: {
            loading: false,
            data: {},
        },
    }),
    getters: {
        //
    },
    actions: {
        getUsers({ commit }) {
            commit("setUsersLoading", true);
            return axiosClient
                .get("/users")
                .then((res) => {
                    commit("setUsers", res.data);
                    commit("setUsersLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setUsersLoading", false);
                    throw err;
                });
        },
        getUser({ commit }, id) {
            commit("setUserLoading", true);
            return axiosClient
                .get(`/users/${id}`)
                .then((res) => {
                    commit("setUser", res.data);
                    commit("setUserLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setUserLoading", false);
                    throw err;
                });
        },
        saveUser({ commit }, user) {
            if (user.id) {
                return axiosClient
                    .put(`/users/${user.id}`, user)
                    .then((res) => {
                        toast.success("Zaktualizowano użytkownika!");
                        commit("setUser", res.data);
                        return res;
                    })
                    .catch((err) => {
                        throw err;
                    });
            } else {
                return axiosClient
                    .post("/users", user)
                    .then((res) => {
                        toast.success("Dodano użytkownika!");
                        commit("setUser", res.data);
                        return res;
                    })
                    .catch((err) => {
                        throw err;
                    });
            }
        },
        deleteUser({ commit }, id) {
            return axiosClient
                .delete(`/users/${id}`)
                .then((res) => {
                    toast.error("Usunięto użytkownika!");
                    return res;
                })
                .catch((err) => {
                    throw err;
                });
        },
    },
    mutations: {
        setUsersLoading: (state, loading) => {
            state.users.loading = loading;
        },
        setUsers: (state, users) => {
            state.users.data = users;
        },
        setUserLoading: (state, loading) => {
            state.user.loading = loading;
        },
        setUser: (state, user) => {
            state.user.data = user;
        },
    },
};
