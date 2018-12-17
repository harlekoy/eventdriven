<template>
  <div class="white-wrapper">
    <div class="flex justify-between border-b border-grey-light pb-6 mb-6">
      <p class="lg">
        Account Setup
      </p>
      <p> {{ accountSetup.percentage }} </p>
    </div>
    <table class="w-full">
      <tr  :class="{ 'bg-red-lightest': !accountSetup.email }">
        <td>
          <p class="font-semibold">
            Email
          </p>
        </td>
        <td>
          <p class="font-light">
            {{ authUser.email }}
          </p>
        </td>
        <td class="text-right">
          <a href="#" @click.prevent="resendVerifyEmail()"
          :class="{ 'text-red': !accountSetup.email }"
          class="font-semibold">
            {{ accountSetup.email ? '' : 'Resend' }}
          </a>
        </td>
      </tr>
      <tr
        :class="{
          'bg-red-lightest': notVerified('phone')
        }"
      >
        <td>
          <p class="font-semibold">
            Phone
          </p>
        </td>
        <td>
          <p
            class="font-light"
            :class="{
              'font-semibold text-red': notVerified('phone')
            }"
          >
            <input
              v-model="phoneNum"
              v-mask="'+## (##) ####-####'"
              :class="{
                'bg-red-lightest': notVerified('phone')
              }"
              class="select-text font-light text-black"
              type="tel"
              :masked="true"
              disabled
            >
          </p>
        </td>
        <td class="text-right">
          <a
            v-if="phone.url !== '#'"
            :href="phone.url"
            :class="{ 'btn-loading': load['phone'] }"
            class="font-semibold text-red"
          >
            {{ phone.kycAction }}
          </a>
          <a
            v-else
            href="#"
            :class="{ 'btn-loading': load['phone'] }"
            class="font-semibold text-red"
            @click.prevent="kyc('phone')"
          >
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
      <tr
        :class="{
          'bg-red-lightest': notVerified('user')
        }"
      >
        <td>
          <p class="font-semibold">
            KYC Info
          </p>
        </td>
        <td>
          <p
            class="font-light"
            :class="{
              'font-semibold text-red': notVerified('user')
            }"
          >
            <i
              :class="{
                'icon-warning': notVerified('user') && user.status !== 'Pending'
              }"
            />
            {{ user.status }}
          </p>
        </td>
        <td class="text-right">
          <a
            v-if="user.url !== '#'"
            :href="user.url"
            :class="{ 'btn-loading': load['user'] }"
            class="font-semibold text-red"
          >
            {{ user.kycAction }}
          </a>
          <a
            v-else
            href="#"
            :class="{ 'btn-loading': load['user'] }"
            class="font-semibold text-red"
            @click.prevent="kyc('user')"
          >
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
import { mapGetters, mapActions } from 'vuex'
import { fail, success } from '@utils/toast'
import { has } from 'lodash'

export default {
  directives: {mask},
  data() {
    return {
      load: {
        user: false,
        phone: false,
        email: false
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
      authUser: 'auth/user',
      accountSetup: 'dashboard/getAccountSetup'
    })
  },

  async mounted () {
    await this.fetchAccountSetup()
    this.kycStatus('user')
    this.kycStatus('phone')
  },

  methods: {
    ...mapActions({
      fetchAccountSetup: 'dashboard/fetchAccountSetup'
    }),

    async kyc (type) {
      this.load[type] = true

      const { data: { data } } = await axios.post(`kyc-verify/${this.authUser.id}`, {
        redirect_url: window.location.href,
        type: type
      })

      this.load[type] = false

      if (has(data, 'verification_url')) {
        window.location.href = data.verification_url
      } else if (has(data, 'message')) {
        fail({
          title: 'Oops!',
          text: data.message
        })
      }
    },

    async kycStatus (type) {
      this.load[type] = true

      const { data: { data } } = await axios.get(`kyc-status/${this.authUser.id}/${type}`)

      this.setStatus(data, type)

      this.load[type] = false
    },

    async resendVerifyEmail () {
      this.load['email'] = true

      const { status, message } = await axios.get(`/email/verify-resend/${this.authUser.id}`)

      this.load['email'] = false

      success({
        title: 'Success!',
        text: message
      })
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

        default:
          this[`${type}`].status = 'Missing'
          this[`${type}`].kycAction = 'Verify'
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


