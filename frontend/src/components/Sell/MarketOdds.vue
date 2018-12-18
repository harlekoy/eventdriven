<script>
export default {
  props: ['totalProfitWin','totalProfitLoses', 'marketOdds', 'currency']
}
</script>

<template>
  <div class="bg-teal-light p-6 rounded-lg text-white shadow">
    <div class="flex mb-3">
      <div class="flex-1">
        <p class="text-lg">
          Today’s market odds for this bet are:
        </p>
      </div>
      <div class="w-1/4 text-right">
        <img
          width="30"
          src="@assets/images/icon-tip.svg"
        >
      </div>
    </div>
    <h1 class="text-white mb-3">
      {{marketOdds}}
    </h1>

    <p class="text-lg">
      Total profit if original bet wins
    </p>
    <h1 class="text-white mb-3">
      {{currency}}{{totalProfitWin}}
    </h1>

    <p class="text-lg">
      Total profit if original bet loses
    </p>
    <h1 class="text-white">
      {{currency}}{{totalProfitLoses}}
    </h1>
  </div>
</template>

