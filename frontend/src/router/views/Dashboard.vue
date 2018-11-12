<template>
  <Layout class="bg-green-linear">
    <h1 class="text-center my-8">
      Your Dashboard
    </h1>
    <div class="container mx-auto mb-10 flex board px-3 lg:px-0">
      <div class="side">
        <Balance />
        <AccountSetup />
      </div>
      <div class="main white-wrapper">
        <div class="tabs mb-6">
          <div 
            v-for="tab in dashboardTabs"
            :key="tab.slug"
            :class="['tab', { active: currentTab === tab.slug }]"
            @click="changeTab(tab.slug)"
          >
            <span v-text="tab.title" />
          </div>
        </div>
        <div class="table-wrapper">
          <keep-alive>
            <component
              :is="currentTabComponent"
            />
          </keep-alive>
        </div>
        <div class="actions">
          <a
            href=""
            class="text-base"
          >
            See all transactions
            <i class="icon-down" />
          </a>
        </div>
      </div>
    </div>
    <div class="container mx-auto mb-6 accounts">
      <p class="text-base text-grey border-b border-grey pb-4">
        Your Linked Accounts
      </p>
      <BankAccounts :col-class="'lg:w-1/5 md:w-1/2 w-full'" />
    </div>
  </Layout>
</template>


<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import AccountSetup from '@components/AccountSetup'
import Balance from '@components/Balance'
import BankAccounts from '@components/BankAccounts'
import AllRecentActivity from '@components/AllRecentActivity'
import OpenBets from '@components/OpenBets'
import Bought from '@components/Bought'
import Sold from '@components/Sold'
import { mapGetters, mapActions } from 'vuex';

export default {
  page: {
    title: 'Dashboard',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  components: {
    Layout,
    AccountSetup,
    Balance,
    BankAccounts,
    AllRecentActivity,
    OpenBets,
    Bought,
    Sold,
  },

  computed: {
    ...mapGetters({
      dashboardTabs: 'dashboard/getDashboardTabComponents',
      currentTabComponent: 'dashboard/currentTabComponent',
      currentTab: 'dashboard/getCurrentTab',
    }),
  },

  methods: {
    ...mapActions({
      changeTab: 'dashboard/changeTab'
    }),
  }
}
</script>

<style lang="scss">
  @import '@assets/styles/breakpoints.scss';

  .board {
    @apply flex-row;

    @include breakpoint-max(lg) {
      @apply flex-col;
    }

    .side {
      flex: 0 0 385px;
      padding-right: 25px;

      @include breakpoint-max(lg) {
        @apply pr-0;
        margin-bottom: 25px;
      }

      .white-wrapper {
        padding: 30px 22px 20px;

        &:not(:last-child) {
          margin-bottom: 25px;
        }

        table {
          p {
            @apply leading-loose;
          }
        }
      }
    }

    .white-wrapper.main {
      @apply flex-1 flex flex-col;
      padding: 30px 22px 20px;

      .actions {
        @apply flex-1 items-end flex justify-end mt-6;

        i {
          transform: rotate(-90deg);
          @apply inline-block ml-4;
          font-size: 10px;
        }
      }
    }

    .tabs {
      @apply flex border-b border-grey-darkest;

      @include breakpoint-max(md) {
        @apply flex-col;
      }

      .tab {
        @apply text-base font-semibold text-black bg-grey-lightest px-4 cursor-pointer;
        margin-right: 1px;
        line-height: 41px;

        &.active {
          @apply bg-green-darker text-white;
        }
      }
    }
  }

  .accounts {
    > p {
      margin-bottom: 25px;
    }
  }
</style>
