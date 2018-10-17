<template>
  <footer>
    <div class="container mx-auto">
      <a href="#">
        HOME
      </a>
      <i class="icon-down" />
      <a href="#">
        FIFA WORLD CUP
      </a>
      <i class="icon-down" />
      <a href="#">
        GAME LINES
      </a>
    </div>
  </footer>
</template>

<style lang="scss">
  footer {
    @apply flex;

    > .container {
      @apply flex items-center;
    }

    a {
      @apply text-white no-underline font-bold text-xs mr-3;
    }

    i {
      @apply text-yellow mr-3;
      font-size: 8px;
      transform: rotate(-90deg);
    }
  }
</style>
