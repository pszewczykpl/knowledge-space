import axiosClient from "../../axios";
import { useToast } from "vue-toastification";

const toast = useToast();

export default {
    namespaced: true,
    state: () => ({
        risks: {
            loading: false,
            data: [],
        },
        risk: {
            loading: false,
            data: {},
        },
    }),
    getters: {
        //
    },
    actions: {
        getRisks({commit}) {
            commit('setRisksLoading', true)
            return axiosClient.get('/risks')
                .then((res) => {
                    commit("setRisks", res.data);
                    commit('setRisksLoading', false)
                    return res;
                });
        },
        getRisk({commit}, id) {
            commit("setRiskLoading", true);
            return axiosClient
                .get(`/risks/${id}`)
                .then((res) => {
                    commit("setRisk", res.data);
                    commit("setRiskLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setRiskLoading", false);
                    throw err;
                });
        },
        saveRisk({commit}, risk) {
            if (risk.id) {
                return axiosClient
                    .put(`/risks/${risk.id}`, risk)
                    .then((res) => {
                        toast.success("Zaktualizowano Ryzyko!");
                        commit('setRisk', res.data)
                        return res;
                    });
            } else {
                return axiosClient
                    .post("/risks", risk)
                    .then((res) => {
                        toast.success("Dodano Ryzyko!");
                        commit('setRisk', res.data)
                        return res;
                    });
            }
        },
        deleteRisk({commit}, id) {
            return axiosClient.delete(`/risks/${id}`)
                .then((res) => {
                    toast.error("Usunięto Ryzyko!");
                    return res;
                });
        },
    },
    mutations: {
        setRisksLoading: (state, loading) => {
            state.risks.loading = loading;
        },
        setRisks: (state, risks) => {
            state.risks.data = risks;
        },
        setRiskLoading: (state, loading) => {
            state.risk.loading = loading;
        },
        setRisk: (state, risk) => {
            state.risk.data = risk;
        },
    },
}
