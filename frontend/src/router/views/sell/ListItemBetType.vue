<script>
import EmptyContent from '@components/EmptyContent'

export default {

  components: {
    EmptyContent,
  }
}
</script>


<template>
  <div class="flex-1 shadow">
    <div
      v-if="false"
      class="list-wrapper overflow-y-auto"
    >
      <h4>List Item Bet Types</h4>
    </div>
    <div v-else class="h-full">
      <EmptyContent />
    </div>
  </div>
</template>


<style lang="scss" scoped>
.list-wrapper {
  height: 372px;

  .active {
    @apply bg-brand-green text-white;
  }
}
</style>
