<template>
  <div class="cols spaced flex-wrap">
    <div
      class="col"
      :class="colClass"
    >
      <div class="inner bg-red">
        <p class="text-center leading-loose">
          Skrill<br>•••• 8392
        </p>
      </div>
    </div>
    <div
      class="col"
      :class="colClass"
    >
      <div class="inner bg-blue">
        <p class="text-center leading-loose">
          Netella<br>•••• 8392
        </p>
      </div>
    </div>
    <div
      class="col"
      :class="colClass"
    >
      <div class="inner dotted cursor-pointer">
        <p class="text-center text-grey-darker">
          <span class="icon">
            +
          </span>
          <br>Link Account
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    colClass: String
  }
}
</script>

<style lang="scss" scoped>
  @import '@assets/styles/breakpoints.scss';

  .cols {
    .col {
      flex: none;
      margin-bottom: 25px;

      .inner {
        @apply rounded flex items-center justify-center text-white;
        height: 112px;

        &.dotted {
          @apply border border-grey-dark;
          border-style: dotted;
        }

        p {
          @apply text-base;
        }

        .icon {
          @apply rounded-full bg-green flex items-center justify-center m-auto font-light text-3xl text-white;
          height: 30px;
          width: 30px;
        }
      }
    }
  }
</style>
