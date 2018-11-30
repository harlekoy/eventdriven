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
      <tr :class="{
        'bg-red-lightest': notVerified()
      }">
        <td>
          <p class="font-semibold">
            KYC Info
          </p>
        </td>
        <td>
          <p class="font-light" :class="{
            'font-semibold text-red': notVerified()
          }">
            <i :class="{
              'icon-warning': notVerified() && status !== 'Pending'
            }" />
            {{ status }}
          </p>
        </td>
        <td>
          <a href="#" @click.prevent="kyc()" class="font-semibold text-red text-right">
            {{ kycAction }}
          </a>
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
import axios from 'axios'
import { mask } from 'vue-the-mask'
import { mapGetters } from 'vuex'

export default {
  directives: {mask},
  data() {
    return {
      phone: '4499 4444 3333',
      status: 'Missing',
      kycAction: 'Verify'
    }
  },

  computed: {
    ...mapGetters({
      user: 'auth/user'
    })
  },

  async mounted () {
    await this.kycStatus()
  },

  methods: {
    async kyc() {
      const { data: { data: { verification_url } } } = await axios.post(`kyc-verify/${this.user.id}`, {
        redirect_url: window.location.href
      })

      window.location.href = verification_url
    },

    async kycStatus() {
      const { data: { data } } = await axios.get(`kyc-status/${this.user.id}`)

      switch (data.event) {
        case "request.timeout":
        case "request.invalid":
          this.status = 'Invalid'
          this.kycAction = 'Recheck'
          break;

        case "request.pending":
          this.status = 'Pending'
          this.kycAction = ''
          break;

        case "verification.accepted":
          this.status = 'Verified'
          this.kycAction = ''
          break;

        case "verification.declined":
          this.status = 'Declined'
          this.kycAction = 'Recheck'
          break;
      }
    },

    notVerified() {
      return this.status !== 'Verified'
    }
  }
}
</script>

<style lang="scss" scoped>
input[disabled] {
  @apply text-black;
}
</style>


