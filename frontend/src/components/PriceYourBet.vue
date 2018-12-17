<template>
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
              v-model="form.total_wager_value"
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
              v-model="form.sell_percentage"
              class="amount mr-0 sm:mr-2 text-xl input-size-lg"
            />
          </div>
          <div class="flex-1 mb-3">
            <BaseRangeSlider
              :min="0"
              :max="100"
            />
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
              slot="icon"
              width="26"
              class="pl-2"
              src="@assets/images/icon-info.svg"
            >
            <div slot="text">
              <h4 class="mb-2 pb-1 font-medium border-b border-grey-lightest">
                Smart Pricing
              </h4>
              <p class="text-grey-dark text-sm">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, recusandae? Eveniet, et!
              </p>
            </div>
          </PopOver>
        </div>

        <div class="flex justify-center items-center mb-3">
          <div class="w-1/4 pr-3">
            <BaseInput
              v-model="form.sell_percentage"
              class="amount mr-0 sm:mr-2 text-xl input-size-lg"
            />
          </div>
          <div class="flex-1 mb-3">
            <BaseRangeSlider
              :min="0"
              :max="200"
            />
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
              slot="icon"
              width="26"
              class="pl-2"
              src="@assets/images/icon-info.svg"
            >
            <div slot="text">
              <h4 class="mb-2 pb-1 font-medium border-b border-grey-lightest">
                Keep in Play
              </h4>
              <p class="text-grey-dark text-sm">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, recusandae? Eveniet, et!
              </p>
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
</template>

<script>
export default {
}
</script>
