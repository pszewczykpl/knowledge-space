import axiosClient from "../../axios";
import store from "@/store";
import {state} from "vue-tsc/out/shared";

export default {
    namespaced: true,
    state: () => ({
        user: {
            data: {},
            authenticated: false,
            asGuest: false,
        },
    }),
    getters: {
        hasRole: (state) => (code) => {
            return state.user.data.roles && state.user.data.roles.some(role => role.code === code);
        }
    },
    actions: {
        async csrf({commit}, user) {
            return await axiosClient.get('/sanctum/csrf-cookie');
        },
        async register({commit}, user) {
            return axiosClient.post('/register', user)
                .then((res) => {
                    commit('setUser', res.data.user);
                    commit('setAuthenticated', true);
                    return res.data;
                })
        },
        async login({commit}, user) {
            return axiosClient.post('/login', user)
                .then((res) => {
                    commit('setUser', res.data.user);
                    commit('setAuthenticated', true);
                    return res.data;
                })
        },
        async forgotPassword({commit}, user) {
            return axiosClient.post('/forgot-password', user);
        },
        async resetPassword({commit}, data) {
            return axiosClient.post('/reset-password', data);
        },
        async loginAsGuest({commit}, user) {
            commit('setUser', '{}');
            commit('setAsGuest', true);
        },
        async logout({commit}) {
            commit('logout')
            commit('setAuthenticated', false);
            return axiosClient.post('/logout');
        },
        getUser({commit}) {
            if(!store.state.auth.user.asGuest) {
                return axiosClient.get('/profile')
                    .then(res => {
                        commit('setUser', res.data)
                    })
            }
        },
    },
    mutations: {
        logout: (state) => {
            state.user.data = {};
        },
        setUser: (state, user) => {
            state.user.data = user;
        },
        setAuthenticated: (state, value) => {
            state.user.authenticated = value;
        },
        setAsGuest: (state, value) => {
            state.user.authenticated = value;
            state.user.asGuest = value;
        },
    },
}
