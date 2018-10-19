<template>
<BaseInput
  class="flex relative items-center"
  v-model="value"
  :type="type"
  placeholder="Password"
  :error="error"
>
<a v-if="value" class="absolute pin-r p-4" @click="toggle" href="#">
  <BaseIcon
    class="text-grey"
    :name="icon"
  />
</a>
</BaseInput>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      default: ''
    },

    error: {
      type: String,
      default: null
    }
  },

  watch: {
    value (current) {
      this.$emit('input', current)
    }
  },

  data () {
    return {
      password: '',
      icon: 'eye-slash',
      type: 'password',
    }
  },

  methods: {
    toggle () {
      this.icon = this.icon.includes('slash') ? 'eye' : 'eye-slash'
      this.type = this.type === 'password' ? 'text' : 'password'
    }
  }
}
</script>
