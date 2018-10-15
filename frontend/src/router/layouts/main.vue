<template>
  <div>
    <NavBar />
    <slot />
  </div>
</template>

<script>
import NavBar from '@components/nav-bar'

export default {
  components: { NavBar },
}
</script>
