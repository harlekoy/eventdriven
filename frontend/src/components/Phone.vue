<script>
import {TheMask} from 'vue-the-mask'

export default {

  components: {
    TheMask
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
  data() {
    return {
      phone: '',
    }
  },

  computed: {
    modelName () {
      return this.$vnode.data.model.expression
    }
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
      v-model="phone" 
      :mask="pattern" 
      :placeholder="placeholder" 
      :masked="true"
      @input="getValue"
    />  
  </div>
</template>

<style lang="scss" module>
@import '@design';
</style>
