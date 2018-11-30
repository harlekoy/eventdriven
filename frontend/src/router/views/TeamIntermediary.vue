<template>
  <Layout>
    <Banner 
      :img="require('@assets/images/team.png')" 
      class="team"
    >
      <h1>
        <img 
          src="@assets/images/seal.png" 
          width="94"
        >
        Manchester City
      </h1>
    </Banner>

    <div class="container mx-auto flex flex-wrap py-6">
      <div class="lg:w-3/5 w-full">
        <!-- Competitions -->
        <h4 class="border-b border-grey-light pb-2">
          Competitions
        </h4>
        <div class="cols py-6">
          <div 
            v-for="(item, index) in competitors"
            :key="index"
            class="col w-full sm:w-1/2 flex-auto text-base leading-loose"
          >
            <router-link 
              :to="{ name: 'home' }"
              class="text-green">
              {{ item.name }}
            </router-link>
          </div>
        </div>
        <!-- Leagues -->
        <h4 class="border-b border-grey-light pb-2">
          Leagues
        </h4>
        <div class="cols spaced py-6">
          <div class="col w-full sm:w-1/3 sm:mb-0 mb-6 flex-auto">
            <LeagueCard />
          </div>
          <div class="col w-full sm:w-1/3 sm:mb-0 mb-6 flex-auto">
            <LeagueCard />
          </div>
          <div class="col w-full sm:w-1/3 sm:mb-0 mb-6 flex-auto">
            <LeagueCard />
          </div>
        </div>
        <!-- Player -->
        <h4 class="border-b border-grey-light pb-2">
          Players
        </h4>
        <div class="cols py-6">
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Riyad Mahrez
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Gabriel Jesus
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Vincent Kompany
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Claudio Bravo
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Sergio Aguero
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              David Silva
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Fernandindo
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Danilo
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Leroy Sané
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Benjamin Mendy
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Phil Foden
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Ilkay Gundogan
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Kevin De Bruyne
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Ederson Santana
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Aymeric Laporte
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Bernando Silva
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Raheem Sterling
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Kyle Walker
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              John Stones
            </a>
          </div>
          <div class="col w-full sm:w-1/4 flex-auto text-base leading-loose">
            <a class="text-green">
              Nicholas Otamendi
            </a>
          </div>
        </div>
      </div>
      <div class="lg:w-2/5 w-full lg:pl-20">
        <div class="rounded border border-grey-light bg-grey-lighter overflow-hidden py-5 px-6">
          <h4>
            <b class="font-medium">
              Subscribe to Prophet’s<br>Football Updates!
            </b>
          </h4>
          <div class="my-6">
            <p class="text-base text-green flex items-center font-medium leading-loose">
              <i class="icon-check mr-4" /> It’s free
            </p>
            <p class="text-base text-green flex items-center font-medium leading-loose">
              <i class="icon-check mr-4" /> It’s easy
            </p>
            <p class="text-base text-green flex items-center font-medium leading-loose">
              <i class="icon-check mr-4" /> We won’t be annoying
            </p>
          </div>
          <button class="rounded-sm bg-blue-dark w-full text-base text-white h-12 font-semibold flex justify-center relative mb-5">
            <i class="icon-fb text-xl pin-l pin-y absolute h-12 flex items-center ml-4" />
            Continue with Facebook
          </button>
          <button class="rounded-sm bg-red-light w-full text-base text-white h-12 font-semibold flex justify-center relative mb-5">
            <i class="icon-google-plus text-xl pin-l pin-y absolute h-12 flex items-center ml-4" />
            Continue with Google
          </button>
          <div class="flex items-center justify-center mb-5">
            <div class="border-b border-grey-light w-full" />
            <p class="font-semibold text-base bg-grey-lighter px-4">
              or
            </p>
            <div class="border-b border-grey-light w-full" />
          </div>
          <button class="rounded-sm bg-grey-darker w-full text-base text-white h-12 font-semibold flex justify-center relative">
            Sign up with an email
          </button>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Banner from '@components/Banner'
import LeagueCard from '@components/LeagueCard'
import { mapGetters, mapActions } from 'vuex';

export default {
  page: {
    title: 'Team Intermediary',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  props: ['id'],

  components: {
    Layout,
    Banner,
    LeagueCard
  },

  computed: {
    ...mapGetters({
      competitors: 'sports/competitors'
    })
  },

  async mounted() {
    await this.fetchCompetitors()
  },

  methods: {
    ...mapActions({
      fetchCompetitors: 'sports/fetchCompetitors'
    })
  }
}
</script>
