<template>
  <div>
    <input
      :class="classes"
      :type="type"
      :value="value"
      v-on="listeners"
      v-bind="$attrs"
    >
    <span
      v-show="hasError()"
      class="text-red text-xs"
    >
      {{ errorMsg() }}
    </span>
  </div>
</template>

<script>
import { find } from 'lodash'

export default {
  inheritAttrs: false,

  props: {
    type: {
      type: String,
      default: 'text',
    },
    value: {
      type: [String, Number],
      default: '',
    },

    targetClass: {
      type: Object,
      default () {
        return {}
      }
    }
  },

  data () {
    return {
      classes: {}
    }
  },

  watch: {
    targetClass: {
      handler (current) {
        this.classes = Object.assign(current, {
          invalid: this.hasError()
        })
      },
      immediate: true
    }
  },

  computed: {
    listeners() {
      return {
        ...this.$listeners,
        input: event => this.$emit('input', event.target.value),
      }
    },

    modelName () {
      return this.$vnode.data.model.expression
    }
  },

  methods: {
    hasError () {
      return !! this.error()
    },

    errorMsg () {
      let error = this.error()

      if (error) {
        return error.msg
      }
    },

    error () {
      return find(this.errors.items, { field: this.modelName })
    }
  },
}
</script>
