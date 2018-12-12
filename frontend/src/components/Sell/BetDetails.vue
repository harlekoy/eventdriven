<template>
<section>
  <!-- Title -->
  <h1 class="text-center py-10">
    Your bet details
  </h1>
  <div class="bg-white flex mb-10 shadow-md overflow-hidden">
    <div class="flex-1">
      <!-- Select: Event -->
      <BetItem
        v-model="active.match"
        question="Which match it is?"
        @activating="clearActive('match')"
      >
        <p
          v-if="form.match"
          class="py-4 text-xl"
        >
          <img
            class="pr-2 pl-1"
            src="@assets/images/icon-checkmark.svg"
          >
          {{ selectedEvent }}
        </p>
        <p
          v-else
          class="py-4 text-xl"
        >
          - Select a sport events -
        </p>
      </BetItem>

      <!-- Select: Team or Player -->
      <BetItem
        v-model="active.bet_on"
        question="What are you betting on?"
        @activating="clearActive('bet_on')"
      >
        <div class="py-4 text-xl relative">
          <BaseInput
            v-model="form.bet_on"
            class="has-icon absolute"
            placeholder="Search teams or players"
          />
          <img
            class="relative p-4"
            src="@assets/images/icon-search.svg"
          >
        </div>
      </BetItem>

      <!-- Select: Type of bet -->
      <BetItem
        v-model="active.bet_type"
        question="What type of bet it is?"
        @activating="clearActive('bet_type')"
      >
        <div class="relative">
          <BaseInput
            v-model="form.bet_type"
            name="bet_type"
            class="has-icon absolute"
            placeholder=""
          />
          <img
            class="relative p-4"
            src="@assets/images/icon-search.svg"
          >
        </div>
      </BetItem>
    </div>

    <!-- load active List item component -->
    <BetListItem
      v-model="form[currentQuestion]"
      :items="items"
    />
  </div>

  <div class="bg-teal-light rounded-lg px-4 py-5 text-white mb-10 shadow-md">
    <h4 class="mb-2 font-medium text-white">
      Your bet details
    </h4>
    <p class="text-lg">
      Arsenal to win the Premier League 2018 at 19:00 GMT 7 September, 2018
    </p>
  </div>

  <!-- Actions -->
  <div class="flex rounded-lg mt-10 text- center justify-center items-center">
    <div class="flex-1">
      <button class="btn btn-lg btn-border border-white w-full uppercase">
        Make it a Parlet
      </button>
    </div>
    <div class="flex-1 uppercase text-center text-brand-green">
      <p class="text-lg">
        &mdash; Or &mdash;
      </p>
    </div>
    <div class="flex-1">
      <button
        class="btn btn-lg border-green w-full uppercase"
        @click.prevent="nextStep(current + 1)"
      >
        Continue
      </button>
    </div>
  </div>
</section>
</template>

<script>
import BetItem from './BetItem'
import BetListItem from './BetListItem'
import { mapGetters, mapActions } from 'vuex'

export default {
  components: {
    BetItem,
    BetListItem,
  },

  props: {
    form: {
      type: Object,
      default () {
        return {}
      }
    }
  },

  watch: {
    async currentQuestion (current) {
      switch (current) {
        case 'match':
          await this.fetchEvents()
          this.items = this.events
          break;
        case 'bet_on':
          this.items = [
            { id: 'teams', name: 'Teams' },
            { id: 'players', name: 'Players' },
          ]
          break;
        case 'bet_type':
          this.items = [
            { id: 'to_win', name: 'To Win' },
            { id: 'proposition_bet', name: 'Proposition Bet' },
          ]
      }
    },
  },

  data () {
    return {
      active: {
        match: false,
        bet_on: false,
        bet_type: false,
      },
      currentQuestion: null,
      items: [],
    }
  },

  computed: {
    ...mapGetters({
      events: 'events/getEvents'
    }),

    selectedEvent () {
      let event = this.events.find((event) => {
        return event.id == this.form.match
      })

      if (event) {
        return event.name
      }
    }
  },

  methods: {
    ...mapActions({
      fetchEvents: 'events/fetchEvents',
    }),

    clearActive (current) {
      if (this.currentQuestion !== current) {
        this.items = []
        this.currentQuestion = current
        this.active = {
          match: false,
          bet_on: false,
          bet_type: false,
        }
      }
    },
  }
}
</script>
