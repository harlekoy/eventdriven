<template>
  <div>
    <!-- Navbar -->
    <NavBar />

    <div class="content px-3 lg:px-0">
      <!-- Title -->
      <slot name="page-title" />

      <!-- Content -->
      <div class="container mx-auto mb-12">
        <div class="flex flex-col md:flex-row">
          <!-- Sidebar -->
          <SideBar />

          <!-- Form  -->
          <div class="white-wrapper flex flex-col flex-1 ml-0 md:ml-6">
            <slot />
          </div>
        </div>
      </div>
    </div>

    <!-- Breadcrumb -->
    <Breadcrumbs />

    <!-- Footer -->
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
    SideBar
  },
}
</script>
