<template>
  <Layout>
    <div class="container mx-auto my-10">
      <!-- Tabs -->
      <Tabs 
        :tabs="[
          { label: 'TO WIN', route: 'competition' },
          { label: 'PROPOSITION BETS', route: 'home' }
        ]"
      />
      <!-- Tabs End -->

      <FrontTable class="mt-5">
        <template slot="head">
          <th class="text-left">
            TEAM
          </th>
          <th class="text-left">
            ODDS
          </th>
          <th class="text-left">
            RISK/RETURN
          </th>
          <th class="text-left">
            PRICE
          </th>
          <th class="text-right">
            ACTION
          </th>
        </template>

        <tr>
          <td>Australia</td>
          <td>-7</td>
          <td>£100 / £150</td>
          <td>£150</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
        <tr>
          <td>Australia</td>
          <td>-7</td>
          <td>£100 / £150</td>
          <td>£150</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
      </FrontTable>
    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Tabs from '@components/FrontTabs'
import FrontTable from '@components/FrontTable'

export default {
  page: {
    title: 'Competition',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  components: {
    Layout,
    Tabs,
    FrontTable
  }
}
</script>
