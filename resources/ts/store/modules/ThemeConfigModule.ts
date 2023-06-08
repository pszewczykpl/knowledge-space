import objectPath from "object-path";
import {ThemeModeComponent} from "@/assets/ts/layout";

const themeModeLSKey = "kt_theme_mode_value";
const themeMenuModeLSKey = "kt_theme_mode_menu";
const layoutConfig = {
  "general": {
    "mode": localStorage.getItem(themeModeLSKey),
    "primaryColor": "#50CD89",
    "pageWidth": "default",
    "layout": "dark-header"
  },
  "header": {
    "display": true,
    "default": {
      "container": "fixed",
      "fixed": {
        "desktop": true,
        "mobile": false
      },
      "menu": {
        "display": true,
        "iconType": "svg"
      }
    }
  },
};

export default {
  state: () => ({
    config: layoutConfig,
    initial: layoutConfig,
    mode: localStorage.getItem(themeModeLSKey)
        ? (localStorage.getItem(themeModeLSKey) as "light" | "dark" | "system")
        : ThemeModeComponent.getSystemMode(),
    classes: {},
  }),
  getters: {
    layoutConfig(state) {
      return (path, defaultValue) => {
        return objectPath.get(state.config, path, defaultValue);
      };
    },
    getThemeMode (state): string {
      return state.mode;
    },
    getClasses(state) {
      return (position) => {
        if (typeof position !== "undefined") {
          return state.classes[position];
        }
        return state.classes;
      };
    },
  },
  mutations: {
    setLayoutConfigProperty(state, payload): void {
      const { property, value } = payload;
      objectPath.set(state.config, property, value);
      localStorage.setItem("config", JSON.stringify(state.config));
    },
    setThemeModeMutation(state, payload) {
      state.mode = payload;
    },
    appendBreadcrumb(state, payload) {
      const { position, className } = payload;
      if (!state.classes[position]) {
        state.classes[position] = [];
      }
      state.classes[position].push(className);
    }
  },
  actions: {
    setThemeModeAction({commit}, payload) {
      localStorage.setItem(themeModeLSKey, payload);
      localStorage.setItem(themeMenuModeLSKey, payload);
      document.documentElement.setAttribute("data-theme", payload);
      ThemeModeComponent.init();
      commit('setThemeModeMutation', payload);
    },
    addBodyClassName({commit}, className) {
      document.body.classList.add(className);
    },
    addBodyAttribute({commit}, payload) {
      const { qualifiedName, value } = payload;
      document.body.setAttribute(qualifiedName, value);
    },
    addClassName({commit}, payload) {
      commit('appendBreadcrumb', payload);
    }
  },
}
