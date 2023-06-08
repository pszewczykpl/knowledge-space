import { createStore } from 'vuex';

import ThemeConfigModule from "@/store/modules/ThemeConfigModule";
import ProductsModule from "@/store/modules/ProductsModule";
import AuthModule from "@/store/modules/AuthModule";
import FilesModule from "@/store/modules/FilesModule";
import LinksModule from "@/store/modules/LinksModule";
import { Product } from "@/core/types/Product";
import {File} from "@/core/types/File";
import {User} from "@/core/types/User";
import FileCategoriesModule from "@/store/modules/FileCategoriesModule";
import FundsModule from "@/store/modules/FundsModule";

interface State {
  // AuthModule
  auth: {
    user: {
      data: User,
      authenticated: boolean
    }
  },
  // ProductsModule
  products: {
    products: {
      loading: boolean,
      data: Product[]
    },
    product: {
      loading: boolean,
      data: Product,
      files: {
        loading: boolean,
        data: File[]
      },
      comments: {
        loading: boolean,
        data: any[]
      }
    }
  },
  // FilesModule
  files: any,
  // LinksModule
  links: any,
  fileCategories: any,
  funds: any,
}

const store = createStore<State>({
  modules: {
    theme: ThemeConfigModule,
    auth: AuthModule,
    products: ProductsModule,
    files: FilesModule,
    links: LinksModule,
    fileCategories: FileCategoriesModule,
    funds: FundsModule,
  },
});

export default store;
