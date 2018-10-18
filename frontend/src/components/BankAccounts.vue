<template>
  <div class="container mx-auto mb-6 accounts">
    <p class="text-base text-grey border-b border-grey pb-4">Your Linked Accounts</p>
    <div class="cols spaced flex-wrap">
      <div class="col lg:w-1/5 md:w-1/2 w-full">
        <div class="inner bg-red">
          <p class="text-center leading-loose">
            Skrill<br>•••• 8392
          </p>
        </div>
      </div>
      <div class="col lg:w-1/5 md:w-1/2 w-full">
        <div class="inner bg-blue">
          <p class="text-center leading-loose">
            Netella<br>•••• 8392
          </p>
        </div>
      </div>
      <div class="col lg:w-1/5 md:w-1/2 w-full">
        <div class="inner dotted">
          <p class="text-center text-grey-darker">
            <span class="icon">+</span>
            <br>Link Account
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  @import '@design';

  .accounts {
    > p {
      margin-bottom: 25px;
    }

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
          @apply rounded-full bg-green block m-auto font-light text-3xl text-center text-white;
          height: 30px;
          padding: 1px 0 0 1px;
          width: 30px;
          line-height: 30px;
        }
      }
    }
  }
</style>
