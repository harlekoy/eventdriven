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
          <div
            v-for="(sport, sport_key) in sports"
            :key="sport_key"
            class="item"
            :class="{ active: sport_key === 0 }"
            @mouseenter="showInnerMenu"
          >

            {{ sport.name }}
            <i class="icon-down" />

            <div class="inner">
              <section>
                <p><b>EVENTS</b></p>
                <div class="items">
                  <div class="item">
                    NFL Playoffs
                  </div>
                  <div class="item">
                    Superbowl
                  </div>
                </div>
                <div class="divider divider-green"/>
              </section>
              <section>
                <p><b>TEAMS</b></p>
                <div class="items">
                  <div class="item">
                    Buffallo Bills
                  </div>
                  <div class="item">
                    LA Rams
                  </div>
                  <div class="item">
                    Carolina Panthers
                  </div>
                  <div class="item">
                    Miami Dolphins
                  </div>
                  <div class="item">
                    Chicago Bears
                  </div>
                  <div class="item">
                    Minnesota Vikings
                  </div>
                  <div class="item">
                    Cincinnati Bengals
                  </div>
                  <div class="item">
                    New Orleans Saints
                  </div>
                  <div class="item">
                    Cleveland Browns
                  </div>
                  <div class="item">
                    New York Giants
                  </div>
                  <div class="item">
                    Dallas Cowboys
                  </div>
                  <div class="item">
                    New York Jets
                  </div>
                  <div class="item">
                    Denver Broncos
                  </div>
                  <div class="item">
                    Philadelphia Eagles
                  </div>
                  <div class="item">
                    Houston Texans
                  </div>
                  <div class="item">
                    Pittsburgh Steelers
                  </div>
                  <div class="item">
                    Kansas City Chiefs
                  </div>
                  <div class="item">
                    San Francisco 49ers
                  </div>
                </div>
              </section>
            </div>
          </div>

          <!-- Close -->
          <div class="close" @click="deactivate">Close</div>

        </div>

        <!-- Child -->
        <div ref="child" class="child">
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
import { forEach, indexOf } from 'lodash'
import { mapGetters } from 'vuex'

export default {
  components: {

  },
  data() {
    return {
      hideOnPages: ['sell']
    }
  },

  computed: {
    ...mapGetters({
      sports: 'sports/sports'
    }),

    onPage() {
      return !this.hideOnPages.includes( this.$route.name )
    }
  },

  methods: {
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

    showInnerMenu (e) {
      // Select all items.
      const all = document.querySelectorAll('.menu-dropdown > .parent > .item')

      // Get target from event.
      const target =  e.target

      // Reset all item classes.
      forEach(all, (item) => { item.classList.remove('active') })

      // Activate selected item.
      target.classList.add('active')

      // Copy content to child menu.
      this.$refs.child.innerHTML = target.querySelector('.inner').innerHTML
    }
  }
}
</script>
