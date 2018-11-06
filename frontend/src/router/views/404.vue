<template>
  <Layout class="bg-green-linea">
    <div class="w-full h-full flex">
      <div class="container flex flex-col-reverse lg:flex-row mx-auto py-12 lg:py-32">
        <div class="flex-1 flex items-center text-center lg:text-left">
          <div>
            <h1 class="text-6xl lg:text-8xl mb-5 lg:mb-0">
              404
            </h1>
            <p class="text-lg lg:text-xl font-light">
              We are very sorry for the inconvience. It looks like you're trying to access a page that either has been deleted or never even existed.
            </p>
            <div class="mt-4">
              <router-link :to="{ name: 'home' }">
                Go Home
              </router-link>
            </div>
          </div>
        </div>
        <div class="flex-1 justify-center flex mb-6 lg:mb-0">
          <img
            class="w-1/3 lg:w-2/3"
            src="/ace.svg"
          >
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from '@layouts/Main'

export default {
  page: {
    title: '404',
    meta: [{ name: 'description', content: '404' }],
  },
  components: { Layout },
  props: {
    resource: {
      type: String,
      default: '',
    },
  },
}
</script>
