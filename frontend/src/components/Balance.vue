<template>
  <div class="white-wrapper">
    <deposit-funds-modal v-if="showModal" @close="showModal = false"/>
    <div class="cols flex-col sm:flex-row justify-between">
      <div class="col mb-6">
        <h2>£9,054</h2>
        <p class="mt-2 mb-8 uppercase">
          TOTAL BALANACE
        </p>
        <button @click="showModal = true" class="btn btn-success btn-sm w-full">
          Deposit
        </button>
      </div>
      <div class="col mb-6 text-left sm:text-right">
        <h2 class="text-grey">
          £2,000
        </h2>
        <p class="text-grey mb-8 uppercase mt-2">
          OPEN BETS BALANCE
        </p>
        <button class="btn btn-success btn-sm btn-bordered w-full">
          Withdraw
        </button>
      </div>
    </div>
    <p class="text-center uppercase">
      <a href="#">
        SHOW HISTORY
      </a>
    </p>
  </div>
</template>

<script>
import DepositFundsModal from '@components/DepositFundsModal'

export default {
  data () {
    return {
      showModal: false
    }
  },

  components: {
    DepositFundsModal
  }
}
</script>
