<template>
  <table>
    <thead>
      <tr>
        <slot name="head" />
      </tr>
    </thead>
    <tbody>
      <slot />
    </tbody>
  </table>
</template>

<style lang="scss" scoped>
table {
  @apply shadow rounded overflow-hidden;

  thead {
    tr {
      th {
        @apply bg-grey-darker text-white text-base font-bold px-8;
        line-height: 50px;
      }
    }
  }

  tbody {
    @apply bg-grey-lightest;

    tr {
      td {
        @apply py-2 px-8 border-b border-grey-light text-base font-semibold relative;

        &:first-child:before {
          @apply absolute bg-grey-lightest pin-l h-full;
          content: '';
          top: 1px;
          width: 30px;
        }

        &:last-child:before {
          @apply absolute bg-grey-lightest pin-r h-full;
          content: '';
          top: 1px;
          width: 30px;
        }
      }

      &:last-child {
        td {
          @apply pb-4 border-b-0;
        }
      }
    }
  }
}
</style>
