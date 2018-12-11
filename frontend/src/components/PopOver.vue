<template>
  <span
    ref="popover"
    class="popover relative"
  >
    <span
      @mouseover.stop="enterPop"
      @mouseout.stop="leavePop"
      >
        <!-- Icon -->
        <slot name="icon"/>
    </span>
    <transition name="popover">
      <div class="inner"
        v-show="show"
        :class="{ active: show }"
        @mouseover.stop="enterPop"
        @mouseout.stop="leavePop"
        >
          <!-- Popup texts -->
          <slot name="text"/>
      </div>
    </transition>
  </span>
</template>

<script>
export default {
  data() {
    return {
      show: false,
    }
  },

  methods: {
    enterPop() {
      this.show = true
    },

    leavePop() {
      this.show = false
    },
  }
}
</script>

<style lang="scss" scoped>
.popover {
  .inner {
    @apply p-5 bg-white shadow-md absolute opacity-0 leading-normal z-10;
    width: 500px;
    left: 40px;
    top: -16px;
    transition: all .3s ease;

    &.active {
      @apply opacity-100 rounded-sm;
    }

    &::before {
      @apply min-h-0 bg-white absolute;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-right: 20px solid #fff;
      content: ' ';
      left: -8px;
      top: 14px;
      transform: rotate(42deg);
      box-shadow: -3px 4px 5px -3px rgba(0, 0, 0, .1);
    }
  }
}

.popover-leave-active,
.popover-enter {
  @apply opacity-0;
}
</style>