import axios from "axios";
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
});

axiosClient.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axiosClient.defaults.withCredentials = true;

axiosClient.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response.status === 401) {
        store.state.auth.user.authenticated = false;
        store.state.auth.user.data = [];
        router.push({name: 'login'});
    }
    else if (error.response.status === 404) {
        router.push({name: '404'})
    }
    throw error;
});

export default axiosClient;
