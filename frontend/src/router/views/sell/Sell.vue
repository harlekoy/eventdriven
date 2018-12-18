<template>
  <Layout class="bg-grey-lightest">
    <!-- Content -->
    <div class="container mx-auto mb-12 px-32">
      <BetDetails v-show="current == 1" v-model="form"/>
      <PriceYourBet v-show="current == 2" v-model="form"/>
      <section v-show="current == 3">
        <!-- Title -->
        <h1 class="text-center py-10">
          Thanks!
        </h1>
        <div class="text-center text-center h-64">
          <p class="text-lg font-medium mb-4">
            Your bet is now listed.  We will let you know when it has been purchased.
          </p>
          <p class="text-lg">
            Your listing confirmation number is 00011ABCDE
          </p>

          <!-- Actions -->
          <div class="flex rounded-lg mt-10 text- center justify-center items-center">
            <div class="w-3/5 mx-auto">
              <button
                class="btn btn-lg border-green w-full uppercase"
                @click.prevent="reset"
              >
                Continue to Dashboard
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>
  </Layout>
</template>

<script>
import Layout from '@layouts/Main'
import SellSteps from '@components/Sell/SellSteps'
import BetDetails from '@components/Sell/BetDetails'
import MarketOdds from '@components/Sell/MarketOdds'
import PopOver from '@components/PopOver'
import BaseRangeSlider from '@components/BaseRangeSlider'

import ListItemEvent from './ListItemEvent'
import ListItemMatch from './ListItemMatch'
import ListItemBetType from './ListItemBetType'

import PriceYourBet from '@components/PriceYourBet'

import { mapGetters, mapActions } from 'vuex';

export default {
  page: {
    title: 'Sell',
    meta: [{ name: 'description', content: 'Sell' }],
  },

  data() {
    return {
      form: {
        sport_event: null,
        match: null,
        bet_type: '',

        total_wager_value: 100,
        sell_percentage: 80,
        sell_price: 80,
        odds_1: 10,
        odds_2: 1,
      },

      validationErrors: {},
      currency: 1 ? '$' : '€',
      keep_in_play: '',
      search_players: '',
    }
  },

  computed: {
    ...mapGetters({
      current: 'sell/getCurrentStep',
      players: 'sell/getPlayers',
    }),

    filteredList() {
      return this.players.filter( post => {
        return post.name.toLowerCase().includes(this.search_players.toLowerCase())
      })
    },
  },

  components: {
    Layout,
    SellSteps,
    BetDetails,
    MarketOdds,
    PopOver,
    ListItemEvent,
    ListItemMatch,
    ListItemBetType,
    BaseRangeSlider,
    PriceYourBet
  },

  methods: {
    ...mapActions({
      resetStep: 'sell/resetStep',
      nextStep: 'sell/nextStep',
    }),

    reset() {
      this.resetStep()
      this.$router.push({ name: 'dashboard' })
    },

    next() {
      if ( this.validationErrors ) {
        this.nextStep()
      }
    },

    setActive( tabComponent ) {
      this.currentList = tabComponent
    },

    setSell(value) {
      this.c = value
    },

    setPrice(value) {
      this.f = parseInt( value )
    },

    getValue( value ) {
      switch( this.currentList ) {
        case 'list-item-event':
          this.form.sport_event = value
          break;
        case 'list-item-match':
          this.form.match = value
          break;
         case 'list-item-bet-type':
        default:
      }
    },

    toggleValue(checkbox) {
      console.log(checkbox)
    }
  }
}
</script>

<style lang="scss" scoped>
.list-wrapper {
  height: 356px;

  .active {
    @apply bg-brand-green text-white;
  }
}
</style>
