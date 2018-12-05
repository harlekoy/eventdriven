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
      <tr :class="{
          'bg-red-lightest': notVerified('phone')
        }">
        <td>
          <p class="font-semibold">
            Phone
          </p>
        </td>
        <td>
          <p class="font-light" :class="{
            'font-semibold text-red': notVerified('phone')
          }">
            <input
              :class="{
                'bg-red-lightest': notVerified('phone')
              }"
              v-model="phoneNum"
              v-mask="'+## (##) ####-####'"
              class="select-text font-light text-black"
              type="tel"
              :masked="true"
              disabled
            >
          </p>
        </td>
        <td class="text-right">
           <a v-if="phone.url !== '#'" :href="phone.url" :class="{ 'btn-loading': load['phone'] }" class="font-semibold text-red">
            {{ phone.kycAction }}
          </a>
          <a v-else href="#" @click.prevent="kyc('phone')" :class="{ 'btn-loading': load['phone'] }" class="font-semibold text-red">
            {{ phone.kycAction }}
          </a>
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
        'bg-red-lightest': notVerified('user')
      }">
        <td>
          <p class="font-semibold">
            KYC Info
          </p>
        </td>
        <td>
          <p class="font-light" :class="{
            'font-semibold text-red': notVerified('user')
          }">
            <i :class="{
              'icon-warning': notVerified('user') && user.status !== 'Pending'
            }" />
            {{ user.status }}
          </p>
        </td>
        <td class="text-right">
          <a v-if="user.url !== '#'" :href="user.url" :class="{ 'btn-loading': load['user'] }" class="font-semibold text-red">
            {{ user.kycAction }}
          </a>
          <a v-else href="#" @click.prevent="kyc('user')" :class="{ 'btn-loading': load['user'] }" class="font-semibold text-red">
            {{ user.kycAction }}
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
      load: {
        user: false,
        phone: false,
      },
      phoneNum: '4499 4444 3333',
      phone: {
        status: 'Missing',
        kycAction: 'Verify',
        url: '#'
      },
      user: {
        status: 'Missing',
        kycAction: 'Verify',
        url: '#'
      }
    }
  },

  computed: {
    ...mapGetters({
      authUser: 'auth/user'
    })
  },

  async mounted () {
    this.kycStatus('user')
    this.kycStatus('phone')
  },

  methods: {
    async kyc (type) {
      this.load[type] = true

      const { data: { data: { verification_url } } } = await axios.post(`kyc-verify/${this.authUser.id}`, {
        redirect_url: window.location.href,
        type: type
      })

      this.load[type] = false
      window.location.href = verification_url
    },

    async kycStatus (type) {
      this.load[type] = true

      const { data: { data } } = await axios.get(`kyc-status/${this.authUser.id}/${type}`)

      this.setStatus(data, type)

      this.load[type] = false
    },

    notVerified (type) {
      return this[`${type}`].status !== 'Verified'
    },

    setStatus (data, type) {
      switch (data.event) {
        case "request.timeout":
        case "request.invalid":
          this[`${type}`].status = 'Invalid'
          this[`${type}`].kycAction = 'Recheck'
          break;

        case "request.pending":
          this[`${type}`].status = 'Pending'
          this[`${type}`].kycAction = 'Continue'
          this[`${type}`].url = data.verification_url
          break;

        case "verification.accepted":
          this[`${type}`].status = 'Verified'
          this[`${type}`].kycAction = ''
          break;

        case "verification.declined":
          this[`${type}`].status = 'Declined'
          this[`${type}`].kycAction = 'Recheck'
          break;
      }
    }
  }
}
</script>

<style lang="scss" scoped>
input[disabled] {
  @apply text-black;
}
</style>


