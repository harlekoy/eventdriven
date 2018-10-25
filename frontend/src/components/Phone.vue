<script>
import {TheMask} from 'vue-the-mask'

export default {
  data() {
    return {
      phone: '',
    }
  },

  props: {
    type: {
      type: String,
      default: ''
    },

    placeholder: {
      type: String,
      default: ''
    },

    pattern: {
      type: Array,
      default () {
        return {}
      }
    },
  },

  computed: {
    modelName () {
      return this.$vnode.data.model.expression
    }
  },

  components: {
    TheMask
  },

  methods: {
    getValue() {
      this.$emit('input', this.phone )
    }
  }
}
</script>

<template>
  <div>
    <TheMask 
        @input="getValue" 
        :mask="pattern" 
        :placeholder="placeholder" 
        :masked="true"
        v-model="phone"/>  
  </div>
</template>

<style lang="scss" module>
@import '@design';
</style>
