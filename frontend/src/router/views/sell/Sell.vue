<template>
  <Layout class="bg-grey-lightest">
    <!-- Content -->
    <div class="container mx-auto mb-12 px-32">
      <section v-if="current == 1">
        <!-- Title -->
        <h1 class="text-center py-10">
          Your bet details
        </h1>    
          
        <div class="bg-white flex mb-10 shadow-md overflow-hidden">
          <div class="flex-1">
            <div class="flex-1 bg-grey-lighter p-4">
              <div class="flex justify-between items-center">
                <p class="text-lg font-medium">
                  Which match it is?
                </p>
                <i class="icon-down text-xs text-black text-right" />
              </div>
              <p class="py-4 text-xl">
                <img 
                  class="pr-2 pl-1" 
                  src="@assets/images/icon-checkmark.svg"
                >
                English Premiere League
              </p>
            </div>

            <div class="flex-1 clearfix p-4">
              <div class="flex justify-between">
                <p class="text-lg font-medium">
                  Which match it is?
                </p>
                <i class="icon-down text-xs text-black text-right icon-right" />
              </div>
              <div class="py-4 text-xl relative">
                <BaseInput 
                  v-model="search_players"
                  class="has-icon absolute"
                  placeholder="Search teams or players"
                />
                <img 
                  class="relative p-4" 
                  src="@assets/images/icon-search.svg"
                >
              </div>
            </div>

            <div class="flex-1 bg-grey-lighter p-4">
              <p class="mb-4 text-lg font-medium">
                What type of bet it is?
              </p>
              <div class="relative">
                <BaseInput 
                  v-model="to_win" 
                  name="to_win" 
                  class="has-icon absolute"
                  placeholder=""
                />
                <img 
                  class="relative p-4" 
                  src="@assets/images/icon-search.svg"
                >
              </div>
            </div>
          </div>

          <div class="flex-1 shadow">
            <div 
              v-if="filteredList.length" 
              class="list-wrapper overflow-y-auto"
            >
              <p
                v-for="(item, index) in filteredList"
                :key="index"
                to=""
                class="block text-lg py-3 px-5"
                :class="[{active: form.selected_player == index}]"
                @click.prevent="selectPlayer(index)"
              >
                {{ item.name }}
              </p>
            </div>
            <div 
              v-else 
              class="flex h-full justify-center items-center"
            >
              <div class="flex-1 text-center">
                <p class="mb-2">
                  <img 
                    width="150" 
                    src="@assets/images/icon-empty.svg"
                  >                  
                </p>
                <h5 class="font-medium">
                  Ugh, cant find it or it doesn't exist. <br>Try again.
                </h5>                  
              </div>
            </div>
          </div>
        </div>

        <BetDetails />

        <!-- Actions -->
        <div class="flex rounded-lg mt-10 text- center justify-center items-center">
          <div class="flex-1">
            <button class="btn btn-lg btn-border border-white w-full uppercase">
              Make it a Parlet
            </button>
          </div>
          <div class="flex-1 uppercase text-center text-brand-green">
            <p class="text-lg">
              &mdash; Or &mdash;
            </p>
          </div>
          <div class="flex-1">
            <button 
              class="btn btn-lg border-green w-full uppercase" 
              @click.prevent="nextStep(current + 1)"
            >
              Continue
            </button>
          </div>
        </div> 
      </section>


      <section v-if="current == 2">
        <!-- Title -->
        <h1 class="text-center py-10">
          Price You Bet
        </h1>

        <BetDetails />

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
                    v-model="wager_value" 
                    class="amount mr-0 sm:mr-2 input-size-lg"
                  />                  
                </div>
                <div class="flex justify-center items-center px-2 pb-3">
                  <span>at</span>
                </div>
                <div class="w-16">
                  <BaseInput 
                    v-model="odds_1" 
                    class="amount mr-0 sm:mr-2 input-size-lg"
                  />  
                </div>
                <div class="flex justify-center items-center px-2 pb-3">
                  <span>:</span>
                </div>
                <div class="w-16">
                  <BaseInput 
                    v-model="odds_2" 
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
                    v-model="to_sell" 
                    class="amount mr-0 sm:mr-2 text-xl input-size-lg"
                  />
                </div>
                <div class="flex-1">
                  <input type="range">
                </div>
              </div>

              <div class="cols">
                <div class="col half">
                  <p class="pb-2 border-b">
                    New wager value
                  </p>
                  <p class="text-3xl py-3">
                    $100
                  </p>
                </div>
                <div class="col half pl-9">
                  <p class="pb-2 border-b">
                    New wager return
                  </p>
                  <p class="text-3xl py-3">
                    $1,100
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
                    v-model="to_sell" 
                    class="amount mr-0 sm:mr-2 text-xl input-size-lg"
                  />
                </div>
                <div class="flex-1">
                  <input type="range">
                </div>
              </div>

              <div class="cols">
                <div class="col half">
                  <p class="pb-2 border-b">
                    Adjusted Odds
                  </p>
                  <p class="text-3xl py-3">
                    7.25:1
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
            <MarketOdds />
          </div>
        </div>          
      </section>


      <section v-if="current == 3">
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
import { mapGetters, mapActions } from 'vuex';

export default {
  page: {
    title: 'Sell',
    meta: [{ name: 'description', content: 'Sell' }],
  },

  computed: {
    ...mapGetters({
      current: 'sell/getCurrentStep',
      players: 'sell/getPlayers'
    }),

    filteredList() {
      return this.players.filter( post => {
        return post.name.toLowerCase().includes(this.search_players.toLowerCase())
      })
    }
  },

  components: { 
    Layout, 
    SellSteps,
    BetDetails,
    MarketOdds,
    PopOver,
  },

  data() {
    return {
      form: {
        selected_player: 1,        
      },
      validationErrors: {},
      search_players: '',


      // step 1 model data
      to_win: '',

      // step 2 model data
      wager_value: '$ 1,000',
      to_sell: '100%',
      odds_1: 20,
      odds_2: 1,
      keep_in_play: '',      

      // step 3 model data
    }
  },

  methods: {
    ...mapActions({
      resetStep: 'sell/resetStep',
      nextStep: 'sell/nextStep'
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

    selectPlayer(value) {
      // test set selected player
      console.log(value)
      this.form.selected_player = value
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

.icon-right {
  transform: rotate(-90deg);
}
</style>


