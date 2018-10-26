<template>
  <div class="h-full">
    <NavBar />
    <div class="content px-3 lg:px-0">
      <slot name="page-title" />
      <div class="container mx-auto mb-12">
        <div class="flex flex-col lg:flex-row">
          <SideBar />
          <div class="bg-white h-full flex-1 rounded-lg text-grey-darkest p-4 shadow-lg">
            <slot />
          </div>
        </div>
      </div>
    </div>
    <Breadcrumbs />
    <AppFooter />
  </div>
</template>

<script>
import NavBar from '@components/NavBar'
import Breadcrumbs from '@components/Breadcrumbs'
import SideBar from '@components/SideBar'
import AppFooter from '@components/Footer'

export default {
  components: {
    NavBar,
    AppFooter,
    Breadcrumbs,
    SideBar,
  },
}
</script>

<style lang="scss">
@import '@design';
</style>
