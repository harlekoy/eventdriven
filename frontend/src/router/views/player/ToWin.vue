<template>
  <section>
    <BuyModal
      v-if="showModal" 
      @close="showModal = false"
    >
    </BuyModal>
    <!-- ToDo Graph Component see mockup -->

    <!-- Bet for Sale -->
    <front-table class="mt-5">
      <template slot="head">
        <th class="text-left">PLAYERS</th>
        <th class="text-left">ODDS</th>
        <th class="text-left">RISK/RETURN</th>
        <th class="text-left">PRICE</th>
        <th class="text-right">ACTION</th>
      </template>

      <tr>
        <td>Player 1</td>
        <td>-7</td>
        <td>£100 / £150</td>
        <td>-£10</td>
        <td class="text-right">
          <button @click="showModal = true" class="btn btn-xs border-0 btn-success-dark">
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>Player 2</td>
        <td>+7</td>
        <td>£100 / £250</td>
        <td>£650</td>
        <td class="text-right">
          <button @click="showModal = true" class="btn btn-xs border-0 btn-success-dark">
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>Player 3</td>
        <td>+12</td>
        <td>£100 / £350</td>
        <td>£150</td>
        <td class="text-right">
          <button @click="showModal = true" class="btn btn-xs border-0 btn-success-dark">
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>Player 4</td>
        <td>+7</td>
        <td>£100 / £450</td>
        <td>£450</td>
        <td class="text-right">
          <button @click="showModal = true" class="btn btn-xs border-0 btn-success-dark">
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>Player 5</td>
        <td>+7</td>
        <td>£100 / £250</td>
        <td>£250</td>
        <td class="text-right">
          <button @click="showModal = true" class="btn btn-xs border-0 btn-success-dark">
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>Player 6</td>
        <td>+29</td>
        <td>£100 / £350</td>
        <td>£250</td>
        <td class="text-right">
          <button @click="showModal = true" class="btn btn-xs border-0 btn-success-dark">
            BUY
          </button>
        </td>
      </tr>

    </front-table>   
 
  </section>
</template>

<script>
import FrontTable from '@components/FrontTable'
import BuyModal from '@components/BuyModal'

export default {
  data() {
    return {
      showModal: false,
    }
  },

  components: {
    FrontTable,
    BuyModal,
  }
}
</script>

