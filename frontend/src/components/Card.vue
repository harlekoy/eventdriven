<template>
  <router-link
    :to="setUrl"
    class="card"
  >
    <div class="white-wrapper overflow-hidden">
      <div class="thumb">
        <img
          v-if="image"
          :src="image"
          class="w-full"
        >
        <img
          v-else
          :src="`/images/${page}/default_image.jpg`"
        >
      </div>
      <div class="content">
        <p class="text-base font-normal mb-4">
          {{ info.name }}
        </p>
        <div class="cols">
          <div class="col text-center border-r border-grey-light">
            <h2>{{ info.odds }}</h2>
            <p class="text-xs">
              Odds
            </p>
          </div>
          <div class="col text-center border-r border-grey-light">
            <h2>{{ info.return }}</h2>
            <p class="text-xs">
              Return
            </p>
          </div>
          <div class="col text-center">
            <h2>{{ info.wagers }}</h2>
            <p class="text-xs">
              Wagers
            </p>
          </div>
        </div>
      </div>
    </div>
  </router-link>
</template>

<script>
import { tournament } from '@utils/betradar'
import { head, first } from 'lodash'

export default {
  props: ['info', 'page'],

  data () {
    return {
      image: ''
    }
  },

  computed: {
    setUrl () {
      let rawId  = this.info.id + ''
      let values = rawId.split(':')
      let id     = values.pop()

      return {
        path: `${this.page}/${id}`
      }
    }
  },

  mounted () {
    if ( this.info.tournament_id ) {
      let item    = tournament( this.info.sport_id )
      this.image  = _.first(item).image
    }
  },
}
</script>

<style lang="scss" scoped>
  .card {
    .white-wrapper {
      @apply rounded-sm p-0;

      .thumb {
        @apply relative;
        height: 192px;

        svg {
          @apply absolute;
          width: 20px;
          right: 13px;
          top: 13px;
        }

        img {
          height: 100%;
          width: 100%;
          object-fit: cover;
        }
      }

      .content {
        padding: 16px 21px 37px;
      }
    }
  }
</style>
