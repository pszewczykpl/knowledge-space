import axiosClient from "../../axios";
import NotificationService from "@/core/services/NotificationService.ts";

export default {
    namespaced: true,
    state: () => ({
        funds: {
            loading: false,
            data: [],
        },
        fund: {
            loading: false,
            data: {},
        },
    }),
    getters: {
        //
    },
    actions: {
        getFunds({commit}) {
            commit('setFundsLoading', true)
            return axiosClient.get('/funds')
                .then((res) => {
                    commit("setFunds", res.data);
                    commit('setFundsLoading', false)
                    return res;
                });
        },
        getFund({commit}, id) {
            commit("setFundLoading", true);
            return axiosClient
                .get(`/funds/${id}`)
                .then((res) => {
                    commit("setFund", res.data);
                    commit("setFundLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setFundLoading", false);
                    throw err;
                });
        },
        saveFund({commit}, fund) {
            if (fund.id) {
                return axiosClient
                    .put(`/funds/${fund.id}`, fund)
                    .then((res) => {
                        NotificationService.toast().success("Zaktualizowano Fundusz!");
                        commit('setFund', res.data)
                        return res;
                    });
            } else {
                return axiosClient
                    .post("/funds", fund)
                    .then((res) => {
                        NotificationService.toast().success("Dodano Fundusz!");
                        commit('setFund', res.data)
                        return res;
                    });
            }
        },
        deleteFund({ commit }, id) {
            return axiosClient.delete(`/funds/${id}`)
                .then((res) => {
                    NotificationService.toast().error("Usunięto Fundusz!");
                    return res;
                });
        },
    },
    mutations: {
        setFundsLoading: (state, loading) => {
            state.funds.loading = loading;
        },
        setFunds: (state, funds) => {
            state.funds.data = funds;
        },
        setFundLoading: (state, loading) => {
            state.fund.loading = loading;
        },
        setFund: (state, fund) => {
            state.fund.data = fund;
        },
    },
}
