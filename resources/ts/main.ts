import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import { configure } from "vee-validate";
import Toast, { PluginOptions, POSITION } from "vue-toastification";
// import i18n from "@/core/plugins/i18n";

const app = createApp(App);

/**
 * Import dependencies
 */
import "bootstrap";
configure({
    validateOnChange: true,
    validateOnBlur: true,
    validateOnInput: true,
    validateOnModelUpdate: true,
});
const options: PluginOptions = {
    position: POSITION.BOTTOM_RIGHT,
    timeout: 2000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 1.5,
    showCloseButtonOnHover: true,
    hideProgressBar: true,
    closeButton: "button",
    icon: false,
    rtl: false
};
app.use(Toast, options);
// app.use(i18n);


/**
 * Mounting app
 */
app
    .use(store)
    .use(router)
    .mount("#app");
