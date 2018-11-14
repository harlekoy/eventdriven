<template>
  <section>
    <!-- Tab Graph Component -->


    <!-- Bet for Sale -->
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
          <td>-20</td>
          <td>£100 / £150</td>
          <td>£150</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
        <tr>
          <td>Manchester United</td>
          <td>-10</td>
          <td>£90 / £140</td>
          <td>£150</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
        <tr>
          <td>Germany</td>
          <td>-10</td>
          <td>£40 / £120</td>
          <td>£110</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
        <tr>
          <td>France</td>
          <td>-30</td>
          <td>£20 / £400</td>
          <td>£90</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
        <tr>
          <td>Argentina</td>
          <td>-24</td>
          <td>£50 / £100</td>
          <td>£70</td>
          <td class="text-right">
            <button class="btn btn-xs border-0 btn-success-dark">
              BUY
            </button>
          </td>
        </tr>
      </FrontTable>  
  </section>
</template>

<script>
import FrontTable from '@components/FrontTable'

export default {
  data() {
    return {

    }
  },

  components: {
    FrontTable
  }
}
</script>

