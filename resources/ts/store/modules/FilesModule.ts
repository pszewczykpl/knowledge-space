import axiosClient from "@/axios";

export default {
    namespaced: true,
    state: () => ({
        files: {
            loading: false,
            data: [],
        },
        file: {
            loading: false,
            data: {},
        },
    }),
    getters: {
        //
    },
    actions: {
        getFile({commit}, id) {
            return axiosClient
                .get(`/files/${id}`, {
                    responseType: 'blob',
                });
        },
        saveFile({ commit, dispatch }, file) {
            return axiosClient
                .post("/files", file, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((res) => {
                    // toast.success("Dodano Dokument!");
                    commit('setFile', res.data)
                    return res;
                });
        },
    },
    mutations: {
        setFilesLoading: (state, loading) => {
            state.files.loading = loading;
        },
        setFiles: (state, files) => {
            state.files.data = files;
        },
        setFileLoading: (state, loading) => {
            state.file.loading = loading;
        },
        setFile: (state, file) => {
            state.file.data = file;
        },
    },
}
