<template>
  <!--begin::Menu-->
  <div
    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semobold py-4 fs-6 w-275px"
    data-kt-menu="true"
  >
<!--    &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--    <div class="menu-item px-3">-->
<!--      <div class="menu-content d-flex align-items-center px-3">-->
<!--        &lt;!&ndash;begin::Avatar&ndash;&gt;-->
<!--        <div class="symbol symbol-50px me-5">-->
<!--          asda-->
<!--        </div>-->
<!--        &lt;!&ndash;end::Avatar&ndash;&gt;-->

<!--        &lt;!&ndash;begin::Username&ndash;&gt;-->
<!--        <div class="d-flex flex-column">-->
<!--          <div class="fw-bold d-flex align-items-center fs-5">-->
<!--            Max Smith-->
<!--            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"-->
<!--              >Pro</span-->
<!--            >-->
<!--          </div>-->
<!--          <a href="#" class="fw-semobold text-muted text-hover-primary fs-7"-->
<!--            >max@kt.com</a-->
<!--          >-->
<!--        </div>-->
<!--        &lt;!&ndash;end::Username&ndash;&gt;-->
<!--      </div>-->
<!--    </div>-->
<!--    &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu separator&ndash;&gt;-->
<!--    <div class="separator my-2"></div>-->
<!--    &lt;!&ndash;end::Menu separator&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--    <div class="menu-item px-5">-->
<!--      <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--        My Profile-->
<!--      </router-link>-->
<!--    </div>-->
<!--    &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--    <div class="menu-item px-5">-->
<!--      <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--        <span class="menu-text">My Projects</span>-->
<!--        <span class="menu-badge">-->
<!--          <span class="badge badge-light-danger badge-circle fw-bold fs-7"-->
<!--            >3</span-->
<!--          >-->
<!--        </span>-->
<!--      </router-link>-->
<!--    </div>-->
<!--    &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--    <div-->
<!--      class="menu-item px-5"-->
<!--      data-kt-menu-trigger="hover"-->
<!--      data-kt-menu-placement="left-start"-->
<!--      data-kt-menu-flip="center, top"-->
<!--    >-->
<!--      <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--        <span class="menu-title">My Subscription</span>-->
<!--        <span class="menu-arrow"></span>-->
<!--      </router-link>-->

<!--      &lt;!&ndash;begin::Menu sub&ndash;&gt;-->
<!--      <div class="menu-sub menu-sub-dropdown w-175px py-4">-->
<!--        &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--        <div class="menu-item px-3">-->
<!--          <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--            Referrals-->
<!--          </router-link>-->
<!--        </div>-->
<!--        &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--        &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--        <div class="menu-item px-3">-->
<!--          <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--            Billing-->
<!--          </router-link>-->
<!--        </div>-->
<!--        &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--        &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--        <div class="menu-item px-3">-->
<!--          <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--            Payments-->
<!--          </router-link>-->
<!--        </div>-->
<!--        &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--        &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--        <div class="menu-item px-3">-->
<!--          <router-link-->
<!--            to="/pages/profile/overview"-->
<!--            class="menu-link d-flex flex-stack px-5"-->
<!--          >-->
<!--            Statements-->
<!--          </router-link>-->
<!--        </div>-->
<!--        &lt;!&ndash;end::Menu item&ndash;&gt;-->
<!--      </div>-->
<!--      &lt;!&ndash;end::Menu sub&ndash;&gt;-->
<!--    </div>-->
<!--    &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--    <div class="menu-item px-5">-->
<!--      <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--        My Statements-->
<!--      </router-link>-->
<!--    </div>-->
<!--    &lt;!&ndash;end::Menu item&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu separator&ndash;&gt;-->
<!--    <div class="separator my-2"></div>-->
<!--    &lt;!&ndash;end::Menu separator&ndash;&gt;-->

<!--    &lt;!&ndash;begin::Menu item&ndash;&gt;-->
<!--    <div class="menu-item px-5 my-1">-->
<!--      <router-link to="/pages/profile/overview" class="menu-link px-5">-->
<!--        Account Settings-->
<!--      </router-link>-->
<!--    </div>-->
<!--    &lt;!&ndash;end::Menu item&ndash;&gt;-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
      <a @click="logout()" class="menu-link px-5"> Wyloguj </a>
    </div>
    <!--end::Menu item-->
  </div>
  <!--end::Menu-->
</template>

<script lang="ts" setup>
import { useStore } from "vuex";
import { useRouter } from "vue-router";

    const router = useRouter();
    const store = useStore();

    const logout = () => {
      store
        .dispatch('auth/logout')
        .then(() => router.push({ name: "login" }));
    };



</script>
