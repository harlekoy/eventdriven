<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  computed: {
    ...mapGetters({
      stepNames: 'sell/getStepItems',
      current: 'sell/getCurrentStep'
    }),

    itemsStepLength() {
      return this.stepNames.length
    }
  },

  methods: {
    ...mapActions({
      nextStep: 'sell/nextStep'
    }),
  }
}
</script>

<template>
  <div class="w-full md:w-2/5 mx-auto flex justify-center items-center pt-2">
    <div class="flex flex-1 flex-col">

      <div class="flex-1 px-20">
        <input class="w-full slider" type="range" min="1" :max="itemsStepLength" :value="current" disabled>        
      </div>

      <div class="flex-1 text-center flex items-center">

        <!-- Step Names -->
        <p 
          v-for="(item, index) in stepNames"
          :key="index"
          @click="nextStep(index+1)"
          class="text-black text-center flex-1 cursor-pointer justify-between px-2 py-3 opacity-50"
          :class="[{ active: current == index + 1 }]">
          {{ item }}
        </p>

      </div> 

    </div>
  </div>
</template>

<style lang="scss" scoped>
.slider {
  height: 1px;
  @apply bg-grey outline-none w-full appearance-none;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  @apply w-4 h-4 cursor-pointer appearance-none bg-grey-dark rounded-full;
}

.slider::-moz-range-thumb{
  @apply w-16 h-16 cursor-pointer;
}

.slider::-moz-range-thumb {
  @apply w-4 h-4 bg-grey-dark cursor-pointer border-0;
}

.active {
  @apply opacity-100;
}
</style>


