<template>
  <span
    ref="popover"
    @mouseover.stop="enterPop"
    @mouseout.stop="leavePop"
    class="popover relative"
  >
    <!-- Icon -->
    <slot name="icon"/>

    <!-- Popup texts -->
    <div class="inner" :class="[{active: focus}]">
      <slot name="text"/>
    </div>    
  </span>
</template>

<script>
export default {
  data() {
    return {
      focus: false,
    }
  },

  methods: {
    enterPop() {
      this.focus = true
    },

    leavePop() {
      this.focus = false
    },
  }
}
</script>

<style lang="scss" scoped>
.popover {
  .inner {
    @apply p-5 bg-white shadow-md absolute opacity-0 leading-normal;
    width: 500px;
    left: 45px;
    top: -16px;
    transition: all .3s ease;

    &.active {
      @apply opacity-100 rounded-sm;
    }

    &::before {
      @appy h-0;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-right: 20px solid #fff;
      content: ' ';
      left: -8px;
      top: 14px;
      transform: rotate(42deg);
      @apply bg-white absolute;
      box-shadow: -3px 4px 5px -3px rgba(0, 0, 0, .1);
    }
  }
}
</style>


