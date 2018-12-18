<template>
<section>
  <!-- Title -->
  <h1 class="text-center py-10">
    Price You Bet
  </h1>

  <div class="flex rounded-lg">
    <div class="flex flex-col flex-start w-3/5 mr-6">
      <!-- Select One -->
      <div class="flex-1 bg-white px-4 py-5 rounded-lg mb-8 shadow">
        <h5 class="mb-4 font-medium">
          <span class="h-6 w-6 rounded-full bg-grey-darkest text-white inline-block text-center py-1 text-sm">
            1
          </span>
          Total wager value
        </h5>
        <div class="flex justify-start items-center">
          <div class="w-1/4">
            <BaseInput
              v-model="form.total_wager_value"
              class="amount mr-0 sm:mr-2 input-size-lg"
            />
          </div>
          <div class="flex justify-center items-center px-2 pb-3">
            <span>at</span>
          </div>
          <div class="w-16">
            <BaseInput
              v-model="form.odds_1"
              class="amount mr-0 sm:mr-2 input-size-lg"
            />
          </div>
          <div class="flex justify-center items-center px-2 pb-3">
            <span>:</span>
          </div>
          <div class="w-16">
            <BaseInput
              v-model="form.odds_2"
              class="amount mr-0 sm:mr-2 input-size-lg"
            />
          </div>
        </div>
      </div>

      <!-- Select Two -->
      <div class="flex-1 bg-white px-4 py-5 rounded-lg mb-8 shadow">
        <h5 class="mb-3 font-medium">
          <span class="h-6 w-6 rounded-full bg-grey-darkest text-white inline-block text-center py-1 text-sm">
            2
          </span>
          How much of your ticket would you like to Sell?
        </h5>
        <p class="mb-6">
          You can sell all of your ticket, or just a percentage of your ticket.
        </p>

        <div class="flex justify-center items-center mb-3">
          <div class="w-1/4 pr-3">
            <BaseInput
              v-model="form.sell_percentage"
              class="amount mr-0 sm:mr-2 text-xl input-size-lg"
            />
          </div>
          <div class="flex-1 mb-3">
            <BaseRangeSlider
              @input="setSell"
              :min="0"
              :max="100"/>
          </div>
        </div>

        <div class="cols">
          <div class="col half">
            <p class="pb-2 border-b">
              New wager value
            </p>
            <p class="text-3xl py-3">
              {{currency}}{{d}}
            </p>
          </div>
          <div class="col half pl-9">
            <p class="pb-2 border-b">
              New wager return
            </p>
            <p class="text-3xl py-3">
              {{currency}}{{e}}
            </p>
          </div>
        </div>
      </div>

      <!-- Select Three -->
      <div class="flex-1 bg-white px-4 py-5 rounded-lg mb-6 shadow">
        <h5 class="mb-3 font-medium">
          <span class="h-6 w-6 rounded-full bg-grey-darkest text-white inline-block text-center py-1 text-sm">
            3
          </span>
          Select your price
        </h5>
        <div class="flex justify-start items-center mb-6">
          <p>
            Use our Smart Pricing (recommended) or set a fixed price.
          </p>
          <PopOver>
            <img
              width="26"
              class="pl-2"
              slot="icon"
              src="@assets/images/icon-info.svg"
            />
            <div slot="text">
              <h4 class="mb-2 pb-1 font-medium border-b border-grey-lightest">Smart Pricing</h4>
              <p class="text-grey-dark text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, recusandae? Eveniet, et!</p>
            </div>
          </PopOver>
        </div>

        <div class="flex justify-center items-center mb-3">
          <div class="w-1/4 pr-3">
            <BaseInput
              v-model="form.sell_price"
              class="amount mr-0 sm:mr-2 text-xl input-size-lg"
            />
          </div>
          <div class="flex-1 mb-3">
            <BaseRangeSlider
              @input="setPrice"
              :min="1"
              :max="1000"/>
          </div>
        </div>

        <div class="cols">
          <div class="col half">
            <p class="pb-2 border-b">
              Adjusted Odds
            </p>
            <p class="text-3xl py-3">
              {{g}}
            </p>
          </div>
        </div>
      </div>

      <div class="flex rounded-lg text- center justify-start items-center">
        <div>
          <BaseCheckbox
            v-model="keep_in_play"
            class="cursor-pointer whitespace-no-wrap"
            type="checkbox"
            :checked="keep_in_play"
            @input="toggleValue"
          >
            Remember Me
          </BaseCheckbox>
        </div>
        <div class="pt-2">
          <PopOver>
            <img
              width="26"
              class="pl-2"
              slot="icon"
              src="@assets/images/icon-info.svg"
            />
            <div slot="text">
              <h4 class="mb-2 pb-1 font-medium border-b border-grey-lightest">Keep in Play</h4>
              <p class="text-grey-dark text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, recusandae? Eveniet, et!</p>
            </div>
          </PopOver>
        </div>
      </div>

      <!-- Actions -->
      <div class="flex rounded-lg mt-6 text- center justify-center items-center">
        <div class="flex-1">
          <button
            class="btn btn-lg border-green w-full uppercase"
            @click.prevent="nextStep(current + 1)"
          >
            Continue
          </button>
        </div>
      </div>
    </div>

    <div class="flex-1">
      <MarketOdds
        :currency="currency"
        :market-odds="`${form.odds_1}/${form.odds_2}`"
        :total-profit-win="bet_if_win"
        :total-profit-loses="bet_if_loses"
      />
    </div>
  </div>
</section>
</template>

<script>
import MarketOdds from '@components/Sell/MarketOdds'
import PopOver from '@components/PopOver'
import BetDetails from '@components/Sell/BetDetails'
import {mapActions, mapGetters} from 'vuex'

export default {
  props: ['value'],

  watch: {
    value: {
      immediate: true,
      handler (current) {
        this.form = current
      }
    },

    form (currrent) {
      this.$emit('input', current)
    }
  },

  data() {
    return {
      form: {
        total_wager_value: 100,
        sell_percentage: 10,
        sell_price: 150,
        odds_1: 10,
        odds_2: 1,
      },

      currency: 1 ? '$' : '€',
      search_players: '',
      keep_in_play: '',
      adjusted_odd: ''
    }
  },

  computed: {
    ...mapGetters({
      current: 'sell/getCurrentStep',
    }),

    // Odds
    b() {
      return this.form.odds_1 / this.form.odds_2
    },

    // Sell - add percentage symbol
    c_to_percent() {
      return `${this.form.sell_percentage}%`
    },

    // Sell - percentage to decimal value
    c_to_decimal() {
      return this.form.sell_percentage / 100
    },

    // New wager value
    d() {
      let wager_value = this.form.total_wager_value * this.c_to_decimal
      return parseInt( wager_value.toFixed() )
    },

    // New wager return
    e() {
      let result =  ( parseInt( this.form.total_wager_value )  *  parseInt( this.b ) * this.c_to_decimal ) + parseInt( this.d )
      return result.toFixed()
    },

    // Adjusted odds
    g() {
      let value = ( parseInt( this.e ) - parseInt( this.d ) ) / parseInt( this.form.sell_price )

      // Round 2 decimals place
      return Math.round( value * 100 ) / 100
    },

    bet_if_win() {
      let result = ( this.form.total_wager_value * this.b ) - ( this.e - this.d )
      return result.toFixed()
    },

    bet_if_loses() {
      let result = parseInt( this.form.sell_price ) - parseInt( this.d )

      return result.toFixed()
    },
  },

  components: {
    PopOver,
    MarketOdds,
    BetDetails
  },

  methods: {
    ...mapActions({
      nextStep: 'sell/nextStep',
    }),

    toggleValue(checkbox) {
      console.log(checkbox)
    },

    setSell(value) {
      this.form.sell_percentage = value
    },

    setPrice(value) {
      this.form.sell_price = parseInt( value )
    },
  }
}
</script>
