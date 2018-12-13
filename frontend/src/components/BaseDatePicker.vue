<template>
  <datepicker ref="date" :value="value" :placeholder="placeholder" :format="'yyyy-MM-dd'" @input="onUpdate"></datepicker>
</template>

<script>
import Datepicker from 'vuejs-datepicker'

export default {
  components: {
    Datepicker
  },

  props: {
    value: String,
    placeholder: String
  },

  data () {
    return {
      date: null
    };
  },

  mounted () {
    this.date = this.value ? this.value : null
  },

  methods: {
    onUpdate () {
      setTimeout(() => {
        this.$emit('input', this.$refs.date.$el.querySelector('input').value)
      }, 100)
    }
  }
}
</script>

<style lang="scss">
.vdp-datepicker {
  @apply w-full;
  margin-bottom: .75rem !important;

  input {
    @apply bg-grey-lightest p-4 text-sm leading-none rounded-lg w-full border border-transparent;
    height: 50px;

    &:focus {
      @apply border-blue-light
    }
  }

  [aria-invalid="true"] input {
    @apply border-red
  }

  .invalid {
    @apply pb-2;
  }

  .vdp-datepicker__calendar {
    margin-top: 10px;
  }
}
</style>

