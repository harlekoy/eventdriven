<template>
  <table>
    <colgroup>
      <col width="20%">
      <col width="30%">
      <col width="12%">
      <col width="12%">
      <col width="12%">
    </colgroup>
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
        @apply bg-grey-darker text-white text-base font-bold px-4;
        line-height: 50px;
      }
    }
  }

  tbody {
    @apply bg-grey-lightest;

    > tr {
      > td {
				@apply border-b border-grey-light text-base font-semibold relative;
				// padding
				@apply py-2 px-8;
			}

			.date {
				@apply border-r bg-grey-lightest;
			}

			.child-tr-col {
				@apply p-0;

				tr {
					@apply flex;

					&:first-child {
						td {
							&:first-child {
								// border
								@apply border-b border-grey-light;
							}
						}
					}

					td {
						@apply w-full;
						// padding
						@apply py-4 px-4;
					}
				}
			}

			.action {
				@apply border-l border-grey-light;			
			}
		}
		
		.gameday {
			@apply bg-grey-light py-3;

			td {
				@apply py-3;
			}
		}
  }
}
</style>
