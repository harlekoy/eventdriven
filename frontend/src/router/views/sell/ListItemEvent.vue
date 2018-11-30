<script>
import { mapGetters, mapActions } from 'vuex'

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
  }
}
</script>

<template>
  <div class="flex-1 shadow">
    <div
      data-if="filteredList.length" 
      class="list-wrapper overflow-y-auto"
    >
      <p
        v-for="(item, index) in events"
        :key="index"
        class="block text-lg py-3 px-5"
        :data-index="index"
        :class="{active: selected_list == index }"
        @click="select( item, index )"
      >
        {{ item.name }}
      </p>
    </div>
    <!-- <div 
      v-else 
      class="flex h-full justify-center items-center"
    >
      <div class="flex-1 text-center">
        <p class="mb-2">
          <img 
            width="150" 
            src="@assets/images/icon-empty.svg"
          >                  
        </p>
        <h5 class="font-medium">
          Ugh, cant find it or it doesn't exist. <br>Try again.
        </h5>                  
      </div>
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


