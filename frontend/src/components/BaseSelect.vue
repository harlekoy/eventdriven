<template>
  <div class="select-wrapper">
    <div class="inner">
      <v-select v-model="temp" :placeholder="placeholder" :options="options" @input="change" :index="index"></v-select>
      <span v-if="error" class="invalid">
        {{ error }}
      </span>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)

export default {
  data () {
    return {
      temp: null
    }
  },

  props: [
    'placeholder',
    'error',
    'options',
    'value',
    'index'
  ],

  watch: {
    value (value) {
      if (value)
        this.temp = value
    }
  },

  methods: {
    change (e) {
      this.$emit('input', e.value)
    }
  }
}
</script>

<style lang="scss">
.select-wrapper {
  @apply w-full mb-3;

  .inner {
    @apply flex items-center w-full flex-wrap;
  }

  .v-select {
    @apply flex-1;

    .dropdown-toggle {
      @apply bg-grey-lightest rounded-lg w-full border-0 border-transparent m-0 py-0 px-4;

      input {
        @apply py-4 px-0 text-sm leading-none m-0;
        height: 50px;
      }
    }

    .selected-tag {
      padding: 0;
      margin-right: 10px;
    }

    .vs__actions {
      .clear {
        @apply hidden;
      }
    }

    .dropdown-menu {
      @apply border-grey-lightest;
      margin-top: -10px;
    }
  }

  [aria-invalid="true"] input {
    @apply border-red
  }

  .invalid {
    @apply pb-2;
  }
}
</style>
