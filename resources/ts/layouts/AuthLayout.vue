<template>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <router-link to="/" class="d-block d-lg-none mx-auto pt-15">
            <span class="fw-bolder text-white text-bg-primary rounded px-5 py-2 fs-2 shadow-sm">{{ appName }}</span>
        </router-link>

        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <router-view></router-view>

                <div class="m-0">
                    <div class="d-flex flex-center flex-wrap px-5">
                        <div class="d-flex fw-semibold text-primary fs-base">
                            <a href="#" class="px-5" target="_blank">Terms</a>
                            <a href="#" class="px-5" target="_blank">Plans</a>
                            <a href="#" class="px-5" target="_blank">Contact Us</a>
                        </div>
                    </div>

                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->

        <!--begin::Body-->
        <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat"
             style="background-image: url(/media/auth/bg11.png)">
        </div>
        <!--begin::Body-->
    </div></div>
    <!--end::Authentication - Sign-in-->
<!--        </div>-->
<!--      </div>-->

<!--    </div>-->
<!--      <div-->
<!--              class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"-->
<!--            style='background-image: url(media/auth/bg11.png)'-->
<!--      >-->
<!--    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2">-->
<!--      <div-->
<!--        class="d-flex flex-column flex-center py-7 py-lg-10 px-5 px-md-15 w-100"-->
<!--      >-->
<!--&lt;!&ndash;        <router-link to="/" class="mb-0 mb-lg-12">&ndash;&gt;-->
<!--&lt;!&ndash;          <img&ndash;&gt;-->
<!--&lt;!&ndash;            alt="Logo"&ndash;&gt;-->
<!--&lt;!&ndash;            src="../../public/media/logos/custom-1.png"&ndash;&gt;-->
<!--&lt;!&ndash;            class="h-60px h-lg-75px"&ndash;&gt;-->
<!--&lt;!&ndash;          />&ndash;&gt;-->
<!--&lt;!&ndash;        </router-link>&ndash;&gt;-->
<!--          <span class="fw-bolder text-primary text-bg-light rounded-1 px-5 py-2 fs-2 shadow-lg">{{ appName }}</span>-->
<!--          <div class="py-5"></div>-->
<!--        <h1-->
<!--          class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7"-->
<!--        >-->
<!--          Dla pracowników {{ companyName }}-->
<!--        </h1>-->
<!--        <div class="d-none d-lg-block text-white fs-base text-center">-->
<!--            {{ appName }} to miejsce, w którym znajdziesz wszystkie dokumenty produktowe,<br /> które pomogą Ci w codziennej pracy.-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--  </div>-->
</template>

<script setup>
  import { onMounted } from "vue";
  import { useStore } from "vuex";

  // Import VITE_APP_NAME
  const appName = import.meta.env.VITE_APP_NAME;
  const companyName = import.meta.env.VITE_COMPANY_NAME

  const store = useStore();

  onMounted(() => {
      document.body.className = "";
      for (let i = document.body.attributes.length; i-- > 0; )
          document.body.removeAttributeNode(document.body.attributes[i]);
    store.dispatch('addBodyClassName', 'app-blank');
    store.dispatch('addBodyClassName', "bg-body");
  });

</script>
