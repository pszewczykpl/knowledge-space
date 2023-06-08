import {computed} from "vue";
import store from "@/store";

const isAdmin = computed(() => store.getters['auth/hasRole']('admin'));

export { isAdmin };
