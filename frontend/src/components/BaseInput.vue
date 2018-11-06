<template>
  <div class="input-wrapper">
    <div class="inner">
      <input
        autocomplete="off"
        :class="classes"
        :type="type"
        :value="value"
        v-bind="$attrs"
        v-on="listeners"
      >
      <span
        v-show="hasError()"
        class="invalid"
      >
        {{ errorMsg() }}
      </span>
    </div>
    <slot />
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
    },
    error: {
      type: String,
      default: null
    }
  },

  data () {
    return {
      classes: {}
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

  watch: {
    targetClass: {
      handler: 'handleTargetClass',
      immediate: true
    },

    error (current) {
      if (current) {
        this.handleTargetClass(this.classes)
      }
    }
  },

  methods: {
    handleTargetClass (classes) {
      this.classes = Object.assign(classes, {
        'border border-red': this.hasError()
      })
    },

    hasError () {
      return !!this.getError() || !!this.error
    },

    errorMsg () {
      let error = this.getError()

      if (error) {
        return error.msg
      }

      return this.error
    },

    getError () {
      return find(this.errors.items, { field: this.modelName })
    }
  },
}
</script>

<style lang="scss" scoped>
.input-wrapper {
  @apply w-full mb-3;

  .inner {
    @apply flex items-center w-full flex-wrap;
  }

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
}
</style>

