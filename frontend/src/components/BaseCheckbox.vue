<script>
export default {
  props: {
    type: {
      type: String,
      default: 'text',
    },
    checked: {
      type: Boolean,
      default: false,
    },
    name: {
      type: String,
      default: 'text',
    },
  },

  methods: {
    toggleValue() {
      this.$emit('input', !this.checked)
    }
  }
}
</script>

<template>
  <div class="form-check py-3">
    <label
      class="relative pl-3 text-green-darker"
      for="name"
    >
      <span class="text-control text-sm relative pl-5">
        <slot />
      </span>

      <input
        id="name"
        class="opacity-0"
        :checked="checked"
        :type="type"
        @change="toggleValue"
      >
      <span class="checkbox" />
    </label>
  </div>
</template>

<style lang="scss" scoped>
@import '@design';

.form-check {
	label {
    user-select: none;

		input[type="checkbox"] {
      margin-right: 16px;
      @apply absolute pin-l;
    }

		input[type="checkbox"] ~ .checkbox {
			&:before {
        background-color: #eee;
				border-radius: 2px;
				content: '';
				@apply block pin-l absolute pin-t;
				height: 25px;
				width: 25px;
			}
		}

		input[type="checkbox"]:checked ~ .checkbox {
			&:before {
				background:#f8fafc;
				border: 1px solid #eee !important;
			}

			&:after {
				border-bottom: 4px solid #333;
				border-right: 4px solid #333;
				bottom: 3px;
				content: '';
				@apply block absolute;
				height: 13px;
				left: 9px;
				top: 4px;
				transform: rotate(40deg);
				width: 8px;
			}
		}

		input[type="checkbox"]:checked ~ .checkbox {
			&:before {
				background: #eee;
				border: 1px solid #eee !important;
			}

			&:after {
				opacity: 1;
			}
		}
	}
}
</style>
