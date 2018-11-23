<template>
	<section class="container mx-auto my-10">

		<!-- Tabs -->
		<tabs
			:tabs="tabSettings"
			@change="currentTab = $event"/>
		<!-- Tabs End -->

		<!-- Event Information - Fixed -->
		<div class="cols py-4 mb-8">
			<div class="col half flex flex-col">
				<div class="flex items-center">
					<img class="pr-4" width="200" src="/images/events/fifa-world-cup.png">
					<h2 class="font-bold">{{event.name}}</h2>
				</div>
				<div class="py-3">
					<h4 class="font-medium">Current Favorite: <span class="font-thin">Germany (4:1)</span></h4>
				</div>
			</div>
			<div class="col half flex items-start justify-end">
				<router-link to="/events/all-game-lines" class="btn btn-lg border-green w-min-full uppercase shadow-md">
					See All Game Lines
				</router-link>
			</div>
		</div>

		<!-- Content components -->
		<keep-alive>
			<component :is="currentTabComponent"/>
		</keep-alive>

	</section>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'

import Tabs from '@components/FrontTabs'
import ToWin from './ToWin'
import PropositionBets from './PropositionBets'
import {mapActions, mapGetters} from 'vuex'

export default {
  page: {
    title: 'Competition',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  props: ['id'],

  data() {
    return {
      currentTab: 'to-win',
      tabSettings: [
        { 
          label: 'TO WIN', 
          value: 'to-win' 
        },
        { label: 'PROPOSITION BETS', 
          value: 'proposition-bets' 
        }
      ],
      prefixId: 'sr:match:'
    }
  },

  computed: {
    ...mapGetters({
      event: 'events/getEvent'
    }),

    currentTabComponent() {
      return this.currentTab
    },

    // get props params id
    eventId () {
      return this.prefixId + this.id
    }
  },

  mounted() {
    this.fetchEvent(this.eventId)
  },

  methods: {
    ...mapActions({
      fetchEvent: 'events/fetchEvent'
    })
  },

  components: {
    Layout,
    Tabs,
    ToWin,
    PropositionBets,
  }
}
</script>
