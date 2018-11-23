<!-- eslint-disable -->

<template>
  <div class="left">
    <!-- Logo -->
    <slot />

    <!-- Item -->
    <div v-if="onPage" class="item" @click="activate">

      <!-- Label -->
      Buy
      <i class="icon-down" />

      <!-- Menu -->
      <div class="menu-dropdown">

        <!-- Parent -->
        <div class="parent">
          <div class="item">
            <p
              @mouseleave="leaveMenu"
              @mouseenter="enterMenu"
              v-for="(item, index) in sports"
              :data-sport-id="item.id"
              :key="index"
            >
              <span v-text="item.name"/>
              <i class="icon-down" />
            </p>
          </div>

          <!-- Close -->
          <div class="close" @click="deactivate">Close</div>

        </div>

        <!-- Child -->
        <div ref="child" class="child">
          <section>
            <p><b>EVENTS ({{sport_events.length}})</b> </p>
            <div class="items">
              <template v-if="sport_events.length">
                <router-link
                  v-for="(item, index) in sport_events"
                  :key="index"
                  :to="'/'"
                  class="item"
                >
                  {{item.name}}
                </router-link>
              </template>
              <p v-else class="text-black item">No event data</p>
            </div>
          </section>
          <section>
            <p><b>TEAMS ({{sport_teams.length}})</b></p>
            <div class="items">
              <template
                v-if="sport_teams.length"
              >
                <router-link
                  v-for="(item, index) in sport_teams"
                  :key="index"
                  :to="'/'"
                  class="item"
                >
                  {{item.name}}
                </router-link>
              </template>
              <p v-else class="text-black item">No team data</p>
            </div>
          </section>
        </div>

      </div>
    </div>

    <!-- Item -->
    <div v-if="onPage" class="item">
      <router-link 
        to="/sell"
        class="text-xl text-black"
        >Sell</router-link>
    </div>

  </div>
</template>

<script>
import { forEach, indexOf, get } from 'lodash'
import { mapGetters, mapActions } from 'vuex'
import { tournament, team } from '@utils/betradar'

export default {

  data() {
    return {
      hideOnPages: ['sell'],
      sport_teams: [],
      sport_events: []
    }
  },

  mounted() {
    this.fetchTournaments()
  },

  computed: {
    ...mapGetters({
      sports: 'sports/sports',
      teams: 'teams/teams',
    }),

    onPage() {
      return !this.hideOnPages.includes( this.$route.name )
    }
  },

  methods: {
    ...mapActions({
      fetchTournaments: 'sports/fetchTournaments'
    }),

    deactivate () {
      // Select all items.
      const all = document.querySelectorAll('nav > .left > .item')

      // Remove all items active class.
      forEach(all, (item) => { item.classList.remove('active') })
    },

    activate (e) {
      // Get target from event.
      const target =  e.target

      // Check if target has no active class.
      if (indexOf(target.classList, 'active') === -1) {
        this.deactivate()
        target.classList.add('active')
      }
    },

    enterMenu(e) {
      e.target.classList.add('active')

      // get data id
      let sport_id      = e.target.dataset.sportId
      this.sport_teams  = team( sport_id )
      this.sport_events = tournament( sport_id )
    },

    leaveMenu(e) {
      e.target.classList.remove('active')
    },
  }
}
</script>
