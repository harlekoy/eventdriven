<template>
  <div class="flex-1 shadow">
    <div
      v-if="events.length"
      class="list-wrapper overflow-y-auto"
    >
      <a
        href="#"
        v-for="(item, index) in events"
        :key="index"
        class="block text-lg py-3 px-5"
        :data-index="index"
        :class="{ active: selected_list === index }"
        @click.prevent="select( item, index )"
      >
        {{ item.name }}
      </a>
    </div>
    <div
      v-else
      class="h-full"
    >
      <EmptyContent />
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import EmptyContent from '@components/EmptyContent'

export default {
  props: [],

  data() {
    return {
      filteredList: '',
      selected_list: '',
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

<style lang="scss">
.list-wrapper {
  height: 372px;

  .active {
    @apply bg-brand-green text-white;
  }
}
</style>


