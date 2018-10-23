<template>
  <div class="footer bg-green-linear-45">
    <div class="container mx-auto px-3 py-16 flex-col md:flex-row items-start flex items-stretch text-center md:text-left">
      <div class="flex-1 flex-col mb-6 md:mb-0">
        <h3 class="mb-3 text-white text-lg">
          Company
        </h3>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Our Story
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          FAQs
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          How it Works
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Meet the Team
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Careers
        </router-link>
      </div>
      <div class="flex-1 flex-col mb-6 md:mb-0">
        <h3 class="mb-3 text-white text-lg">
          Help & Contact
        </h3>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Contact Us
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Support Docs
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Ask the Community
        </router-link>
      </div>
      <div class="flex-1 flex-col mb-6 md:mb-0">
        <h3 class="mb-3 text-white text-lg">
          Join us
        </h3>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/register"
        >
          Create an Account
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Partner with Us
        </router-link>
        <router-link 
          class="py-2 block text-white text-sm font-thin" 
          to="/"
        >
          Careers
        </router-link>
      </div>
      <FollowUs />
    </div>
  </div>
</template>

<script>
import FollowUs from '@components/FollowUs'

export default {
  components: {
    FollowUs,
  }
}
</script>

<style lang="scss">
  .footer {
    @apply flex bg-green;
    min-height: 260px;
  }
</style>
