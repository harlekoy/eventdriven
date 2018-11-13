<template>
  <router-link :to="page" class="card">
    <div class="white-wrapper overflow-hidden">
      <div class="thumb">
        <!-- <Heart /> -->
        <img :src="`/images/${page}${info.image}`">
      </div>
      <div class="content">
        <p class="text-base font-normal mb-4">
          {{info.name}}
        </p>
        <div class="cols">
          <div class="col text-center border-r border-grey-light">
            <h2>{{info.odds}}</h2>
            <p class="text-xs">
              Odds
            </p>
          </div>
          <div class="col text-center border-r border-grey-light">
            <h2>{{info.return}}</h2>
            <p class="text-xs">
              Return
            </p>
          </div>
          <div class="col text-center">
            <h2>{{info.wagers}}</h2>
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
import Heart from '@components/Heart'

export default {
  props: ['info', 'page'],

  components: {
    Heart
  }
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
