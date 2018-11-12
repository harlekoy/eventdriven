<script>
import ClickOutside from 'vue-click-outside'

export default {

  directives: {
    ClickOutside
  },

  props: ['data'],
  data() {
    return {

    }
  },

  methods: {
    close () {
      this.$emit('close')
    }
  },
}
</script>

<template>
  <div class="sidebar-right modal">
    <div 
      v-click-outside="close"
      class="modal-content bg-brand-green text-white w-2/4 h-32 p-10 overflow-auto shadow-lg"
    >
      <h1 class="text-white flex justify-between mb-6">
        Open Bets
        <span 
          class="text-5xl font-hairline" 
          @click="close"
        >
          &times;
        </span>
      </h1>
      <p class="uppercase py-3 pb-3 border-b-2 border-white">
        Wagers
      </p>
      <p class="py-3 font-thin">
        Manchester United to win versus Liverpool at Old Traffic on June 29, 2018.
      </p>
      <p class="flex justify-between font-medium py-2">
        Your Odds:
        <span class="font-hairline">
          29:1
        </span>
      </p>
      <p class="flex justify-between font-medium py-2">
        Total Bet:
        <span class="font-hairline">
          $ 1000 GBP
        </span>
      </p>
      <p class="flex justify-between font-medium py-2">
        Potential Return:
        <span class="font-hairline">
          $ 29,000 GBP
        </span>
      </p>
      <p class="flex justify-between font-medium py-2">
        Edit Bet:
        <input type="range">
      </p>
      <h2 class="text-center font-normal border-t-2 border-white mt-24 pt-4 mb-1 text-white">
        $9,050
      </h2>
      <p class="text-sm text-center uppercase tracking-wide mb-10">
        Total Balance
      </p>
      <button 
        class="btn border-0 btn-lg bg-white text-green w-full mb-4" 
        @click="showModal = true"
      >
        Deposit
      </button>
      <button class="btn btn-lg btn-border border-white w-full">
        Withdraw
      </button>
    </div>
  </div>
</template>

<style lang="scss">
//@import '@design';

.modal {
  @apply fixed pin-t pin-r w-full h-full z-50 overflow-auto block;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  width: 400px;
  @apply pin-r pin-t h-full absolute;
}

</style>
