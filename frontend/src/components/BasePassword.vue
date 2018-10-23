<template>
  <BaseInput
    v-model="password"
    class="flex relative items-center"
    :type="type"
    placeholder="Password"
    :error="error"
  >
    <a
      v-if="value"
      class="absolute pin-r p-4"
      href="#"
      @click.prevent="toggle"
    >
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

  data () {
    return {
      password: '',
      icon: 'eye-slash',
      type: 'password',
    }
  },

  watch: {
    password (current) {
      this.$emit('input', current)
    },
  },

  methods: {
    toggle () {
      this.icon = this.icon.includes('slash') ? 'eye' : 'eye-slash'
      this.type = this.type === 'password' ? 'text' : 'password'
    }
  }
}
</script>
