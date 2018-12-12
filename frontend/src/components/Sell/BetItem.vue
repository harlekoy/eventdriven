<template>
<div
  :class="{ active }"
  class="list-item list-item-event flex-1 p-4 cursor-pointer border-b border-grey-lightest"
  @click="activate"
>
  <div class="flex justify-between items-center">
    <p class="text-lg font-medium">
      {{ question }}
    </p>
    <i
      class="icon-down text-xs text-black text-right"
    />
  </div>
  <slot />
</div>
</template>

<script>
export default {
  props: {
    value: {
      type: Boolean,
      default: false,
    },
    question: {
      type: String,
      required: true,
    }
  },

  data () {
    return {
      active: false,
    }
  },

  watch: {
    value: {
      immediate: true,
      handler (current) {
        this.active = current
      }
    },

    active (current) {
      this.$emit('input', current)
    }
  },

  methods: {
    activate () {
      this.$emit('activating')
      this.active = true
    }
  },
}
</script>
