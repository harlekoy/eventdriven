<template>
  <div class="card">
    <div class="thumbnail">
      <img src="@assets/images/league-thumb.png">
    </div>
    <div class="info">
      <h4>
        <b class="font-bold">
          UEFA Champions League
        </b>
      </h4>
    </div>
  </div>
</template>

<style lang="scss">
.card {
  @apply rounded shadow bg-grey-lighter overflow-hidden;

  .thumbnail {
    @apply rounded-t;
    height: 163px;

    img {
      @apply w-full h-full;
      object-fit: cover;
    }
  }

  .info {
    @apply p-5;
  }
}
</style>
