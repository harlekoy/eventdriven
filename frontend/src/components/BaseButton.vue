<template>
  <button
    :class="$style.button"
    v-on="$listeners"
  >
    <slot />
  </button>
</template>

<style lang="scss" module>
@import '@design';

.button {
  @extend %typography-small;

  padding: $size-button-padding;
  color: $color-button-text;
  cursor: pointer;
  background: #86cf73;
  background: -moz-linear-gradient(45deg, #86cf73 0%, #30c2c4 100%);
  background: -webkit-linear-gradient(45deg, #86cf73 0%,#30c2c4 100%);
  background: linear-gradient(45deg, #86cf73 0%,#30c2c4 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#86cf73', endColorstr='#30c2c4',GradientType=1 );
  border: none;

  &:disabled {
    cursor: not-allowed;
    background: $color-button-disabled-bg;
  }
}
</style>
