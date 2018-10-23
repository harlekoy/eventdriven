<template>
  <div class="card">
    <div class="white-wrapper overflow-hidden">
      <div class="thumb">
        <Heart />
        <img src="@assets/images/card-thumb.png">
      </div>
      <div class="content">
        <p class="text-base font-normal mb-4">
          Superbowl 2018
        </p>
        <div class="cols">
          <div class="col text-center border-r border-grey-light">
            <h2>80:1</h2>
            <p class="text-xs">
              Odds
            </p>
          </div>
          <div class="col text-center border-r border-grey-light">
            <h2>22x</h2>
            <p class="text-xs">
              Return
            </p>
          </div>
          <div class="col text-center">
            <h2>97</h2>
            <p class="text-xs">
              Wagers
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Heart from '@components/Heart'

export default {
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
