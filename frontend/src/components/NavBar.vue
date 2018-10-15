<template>
  <div></div>
</template>

<script>
import { authComputed } from '@state/helpers'

export default {
  data() {
    return {
    }
  },
  computed: {
    ...authComputed,
  },
}
</script>
