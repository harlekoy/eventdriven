<template>
  <div class="white-wrapper">
    <div class="flex justify-between border-b border-grey-light pb-6 mb-6">
      <p class="lg">
        Account Setup
      </p>
      <p>76% Complete</p>
    </div>
    <table class="w-full">
      <tr>
        <td>
          <p class="font-semibold">
            Email
          </p>
        </td>
        <td>
          <p class="font-light">
            alex@orchestrate.nyc
          </p>
        </td>
        <td>
          <p class="font-semibold text-green text-right">
            Verify
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p class="font-semibold">
            Phone
          </p>
        </td>
        <td>
          <p>
            <input
              v-model="phone"
              v-mask="'+## (##) ####-####'"
              class="select-text font-light bg-white text-black"
              type="tel"
              :masked="true"
              disabled
            >
          </p>
        </td>
        <td>
          <p class="font-semibold text-green text-right">
            Verify
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p class="font-semibold">
            Bank
          </p>
        </td>
        <td>
          <p class="font-light">
            Connected
          </p>
        </td>
        <td>
          <p class="font-semibold text-green text-right">
            + Add
          </p>
        </td>
      </tr>
      <tr class="bg-red-lightest">
        <td>
          <p class="font-semibold">
            KYC Info
          </p>
        </td>
        <td>
          <p class="font-semibold text-red">
            <i class="icon-warning" /> Missing
          </p>
        </td>
        <td>
          <p class="font-semibold text-red text-right">
            + Add
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p class="font-semibold">
            Funds
          </p>
        </td>
        <td>
          <p class="font-light">
            $0.00
          </p>
        </td>
        <td>
          <p class="font-semibold text-green text-right">
            + Deposit
          </p>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import {mask} from 'vue-the-mask'

export default {
  directives: {mask},
  data() {
    return {
      phone: '4499 4444 3333',
    }
  },
}
</script>

<style lang="scss" scoped>
input[disabled] {
  @apply text-black;
}
</style>


