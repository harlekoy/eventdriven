<template>
  <div class="flex-1 shadow">
    <div
      v-if="items.length"
      class="list-wrapper overflow-y-auto"
    >
      <a
        href="#"
        v-for="(item, index) in items"
        :key="index"
        class="block text-lg py-3 px-5"
        :data-index="index"
        :class="{ active: isActive(item) }"
        @click.prevent="selecting(item)"
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
import { isEqual } from 'lodash'

export default {
  props: {
    value: {
      type: String
    },

    items: {
      type: Array,
      required: true
    }
  },

  watch: {
    value: {
      immediate: true,
      handler (current) {
        this.selected = current
      }
    },

    selected (current) {
      this.$emit('input', current)
    }
  },

  data() {
    return {
      selected: null,
    }
  },

  components: {
    EmptyContent,
  },

  methods: {
    isActive (item) {
      return isEqual(item.id, this.selected)
    },

    selecting (item) {
      this.selected = item.id
    }
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

.list-item {
  transition: all .3s ease;
  opacity: .45;
  @apply bg-grey-light;

  .icon-down {
    transition: all .3s ease;
  }

  &.active {
    @apply bg-white opacity-100;

    .icon-down {
      transform: rotate(-90deg) !important;
    }
  }
}
</style>
