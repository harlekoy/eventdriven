<template>
  <div class="slidecontainer">
    <input
      type="range"
      @input="changeValue"
      :min="min"
      :max="max"
      value="50"
      class="slider"
      >
  </div>
</template>

<script>
  export default {
    props: {
      min: {
        type: Number,
        default: 1,
      },

      max: {
        type: Number,
        default: 100,
      },
    },

    data() {
      return {

      }
    },

    methods: {
      changeValue() {
        this.$emit('input', event.target.value)
      }
    }
  }
</script>

<style lang="scss" scoped>
.slidecontainer {
  @apply border-r border-l border-grey-light border-t-0 border-b-0 border-l-2 border-r-2  w-full;
  height: 40px;
  line-height: 35px;
}

.slider {
  @apply bg-grey-light w-full outline-none appearance-none opacity-75;
  height: 5px;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  @apply opacity-100;
}

.slider::-webkit-slider-thumb {
  width: 36px;
  height: 36px;
  @apply rounded-full appearance-none cursor-pointer bg-green;
}

.slider::-moz-range-thumb {
  width: 36px;
  height: 36px;
  @apply rounded-full cursor-pointer bg-green;
}
</style>
