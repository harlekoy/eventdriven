<!-- eslint-disable -->

<template>
  <header class="bg-white">
    <nav class="container mx-auto">
      <!-- Left Side Menu -->
      <LeftMenu>
        <Logo :width="162"/>
      </LeftMenu>

      <!-- Right Side Menu -->
      <RightMenu />

    </nav>
  </header>
</template>

<script>
import Logo from '@components/Logo'
import LeftMenu from '@components/LeftMenu'
import RightMenu from '@components/RightMenu'
import { mapActions } from 'vuex'

/* eslint-disable */

export default {
  components: {
    LeftMenu,
    RightMenu,
    Logo
  },

  mounted () {
    this.fetchSports()
  },

  methods: {
    ...mapActions({
      fetchSports: 'sports/fetchSports'
    })
  }
}
</script>

<style lang="scss">
  @import '@assets/styles/modules/_breakpoints.scss';
  @import '@assets/styles/modules/_header.scss';
</style>
