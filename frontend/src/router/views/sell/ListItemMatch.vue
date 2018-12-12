<script>
import { mapGetters, mapActions } from 'vuex'
import EmptyContent from '@components/EmptyContent'

export default {
  props: [],

  data() {
    return {
      filteredList: '',
      selected_list: '',

      events_sample: [
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Los Angeles vs Cleveland",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Detroit vs New York",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Golder State vs San Antonio",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Houston vs Atlanta",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Los Angeles vs Cleveland",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Detroit vs New York",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Golder State vs San Antonio",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Houston vs Atlanta",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Los Angeles vs Cleveland",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Detroit vs New York",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Golder State vs San Antonio",
          status: "open",
        },
        {
          id: "sr:match:000000",
          sport_id: "sr:sport:2",
          venue_id: "sr:venue:0000",
          tournament_id: "sr:tournament:00000",
          name: "Houston vs Atlanta",
          status: "open",
        },
      ]
  
    }
  },

  mounted() {
    this.fetchEvents()
  },

  methods: {
    ...mapActions({
      fetchEvents: 'events/fetchEvents'
    }),

    select(value, index) {
      this.selected_list = index
      this.$emit('selected', value)
    },
  },

  computed: {
    ...mapGetters({
      events: 'events/getEvents'
    })
  },

  components: {
    EmptyContent,
  }
}
</script>

<template>
  <div class="flex-1 shadow">
    <div
      data-v-if="filteredList.length"
      class="list-wrapper overflow-y-auto"
    >
      <p
        v-for="(item, index) in events_sample"
        :key="index"
        class="block text-lg py-3 px-5"
        :data-index="index"
        :class="{active: selected_list == index }"
        @click="select( item, index )"
      >
        {{ item.name }}
      </p>
    </div>
    <!-- <div v-else class="h-full">
      <EmptyContent />
    </div> -->
  </div>
</template>

<style lang="scss">
.list-wrapper {
  height: 372px;

  .active {
    @apply bg-brand-green text-white;
  }
}
</style>


