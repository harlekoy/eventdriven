<template>
  <div class="h-full bg-green-linear">
    <NavBar />
    <slot />
  </div>
</template>

<script>
import NavBar from '@components/NavBar'

export default {
  components: { NavBar },
}
</script>
