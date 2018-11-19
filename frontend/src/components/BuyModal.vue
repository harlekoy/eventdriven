<script>
export default {
  
}
</script>

<template>
  <BaseModal @close="close">

    <!-- Modal slot content -->
    <div class="content bg-white px-5">

      <!-- Step 1 -->
      <div v-show="step == 1">
        <div class="flex flex-col">

          <div class="text-center">
            <h2 class="mb-8">Choose your stake</h2>
            <div 
              class="close" 
              @click="close"
            >
              &times;
            </div>    
          </div>

          <!-- Bet Info -->
          <div class="flex-1 bg-teal-light p-6 w-full rounded-sm shadow-md">
            <h5 class="text-white">
              <span class="font-bold">Your Bet - </span>Arsenal to win the Premiere League <br>
              <span class="">Match Date: </span>19:00 GMT November 2018
            </h5>
            </div>
          </div>

          <!-- Alert Info -->
          <p class="flex-1 bg-yellow-light p-3 my-5 shadow">
            Please note: Your current daily limit is $800. <router-link to="/home">Read more here</router-link> 
          </p>

          <!-- Buy Slider -->
          <div class="flex-1 bg-white rounded-sm p-4 my-8 shadow-md text-center">
            <div class="mb-4">
                <span class="text-3xl">Up to </span>
                <input 
                  v-model="amount" 
                  type="text" 
                  class="p-2 bg-grey-lightest w-24 text-center text-3xl font-bold"
                /> 
            </div>
            <div class="py-2 w-full border-l border-r border-width-2 border-grey">
              <input
                @input="changeValue" 
                v-model="amount_range" 
                type="range"
                class="w-full"
                min="1"
                max="800"
              />
            </div>
          </div>

          <!-- Market Odds -->
          <div class="flex-1 flex flex-col md:flex-row">

            <div class="flex-1 text-center pr-6 border-r md:border-grey-lightest">
              <h5 class="mb-4 font-medium">
                Market Odds
              </h5>
              <div class="py-4 bg-grey-lightest">
                <h4 class="font-bold">10:1</h4>
              </div>
              <div class="flex items-center p-3 bg-red-dark text-white">
                <div class="flex-1 text-white">
                  <span class="icon flex text-4xl absolute">
                    &times;                
                  </span>
                  <p class="uppercase text-sm mb-1">
                    Potential Return
                  </p>
                  <p class="text-2xl">
                    $1000
                  </p>
                </div>
              </div>
            </div>
            <div class="flex-1 text-center pl-6">
              <h5 class="mb-4 font-medium">
                Prophet Odds
              </h5>
              <div class="py-4 bg-grey-lightest">
                <h4 class="font-bold">20:1</h4>
              </div>
              <div class="flex items-center p-3 bg-brand-green text-white">
                <div class="flex-1 text-white">
                  <span class="flex text-4xl absolute">
                    <img
                      class="icon pr-2 pl-1 pt-2" 
                      src="@assets/images/icon-checkmark-white.svg"
                    >          
                  </span>              
                  <p class="uppercase text-sm mb-1">
                    Potential Return
                  </p>
                  <p class="text-2xl">
                    $2000
                  </p>
                </div>
              </div>
              <div>
                <p class="bg-yellow-light p-3 uppercase">
                  x2 Premium with Prophet
                </p>              
              </div>
            </div>
          </div>

          <!-- Next -->
          <div class="flex-1 text-center py-8 mt-10">
            <button 
              class="w-2/5 btn btn-success btn-lg px-20 border-0 shadow-md" 
              @click="nextStep"
            >
              Place you bet
            </button>        
          </div>
        </div>
      </div>

      <!-- Step 2 - Confirmation -->
      <div v-show="step == 2">
        <div class="text-center mb-16">
          <h2 class="mb-8">Thank you for placing your bet</h2>
          <div 
            class="close" 
            @click="close"
          >
            &times;
          </div>
          <p class="text-lg">Your confirmation number is 000121343FD</p>
        </div>
  
        <!-- Next -->
        <div class="flex-1 text-center py-8">
          <button 
            class="w-2/5 btn btn-success btn-md px-20 border-0 shadow" 
            @click="close"
          >
            Continue Browsing
          </button>        
        </div>
      </div>

  </BaseModal>
</template>

<script>
import Arrow from '@components/Arrow'
import BaseModal from '@components/BaseModal'
import BaseInput from '@components/BaseInput'
import ClickOutside from 'vue-click-outside'

export default {
  data () {
    return {
      step: 1,
      max: 2,
      amount: '$100',
      amount_range: 209,
      market_odds: ''
    }
  },

  directives: {
    ClickOutside,
  },

  components: {
    BaseModal,
    Arrow,
    BaseInput,
  },

  methods: {
    close () {
      this.$emit('close')
    },

    nextStep () {
      if (this.step < this.max) {
        this.step++
      }
    },

    changeValue() {
      this.amount = this.amount_range
    }
  }
}
</script>

<style lang="scss">
@import '@assets/styles/breakpoints.scss';

.icon {
  @apply ml-4 mt-1;
}

.modal-wrapper {
  .close {
    @apply absolute cursor-pointer text-4xl text-grey;
    top: -5px;
    right: 22px;
  }
}
</style>

