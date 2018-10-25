<template>
  <BaseModal @close="close">
    <template slot="header">
      <h2>Deposit Funds</h2>
      <div 
        class="close" 
        @click="close"
      >
        &times;
      </div>
    </template>
    <div class="flex flex-col items-center justify-center">
      <!-- Steps -->
      <div class="steps">
        <div 
          class="step" 
          :class="{ active: index === 1 }" 
          @click="index = 1"
        >
          <div class="count">
            1<Arrow />
          </div>
          Choose amount
        </div>
        <div 
          class="step" 
          :class="{ active: index === 2 }" 
          @click="index = 2"
        >
          <div class="count">
            2<Arrow />
          </div>
          Payment Method
        </div>
        <div 
          class="step" 
          :class="{ active: index === 3 }"
        >
          <div class="count">
            3
          </div>
          Confirmation
        </div>
      </div>

      <!-- Form -->
      <form class="flex">
        <section 
          class="flex flex-col sm:flex-row items-center justify-center w-full" 
          :class="{ active: index === 1 }"
        >
          <BaseInput 
            v-model="amount" 
            class="amount mr-0 sm:mr-2"
          />
          <BaseInput 
            v-model="currency" 
            class="amount"
          />
        </section>
        <section 
          :class="{ active: index === 2 }" 
          class="w-full border-b border-grey-light pb-10"
        >
          <!-- Heading -->
          <p class="font-black mb-6">
            Bank Accounts
          </p>

          <!-- Bank Accounts -->
          <BankAccounts :col-class="'lg:w-1/3 w-full'" />

          <!-- Heading -->
          <p class="font-black mb-6">
            Account Details
          </p>

          <!-- Account Number -->
          <BaseInput
            v-model="account_number"
            class="w-full"
            :target-class="{ 'w-full': true }"
            placeholder="Account Number"
          />

          <!-- Name -->
          <BaseInput
            v-model="name"
            class="w-full"
            :target-class="{ 'w-full': true }"
            placeholder="Name on Account"
          />

          <div class="cols sm:flex flex-col">
            <div class="col">
              <!-- Month -->
              <BaseInput
                v-model="exp_month"
                class="w-full"
                :target-class="{ 'w-full': true }"
                placeholder="Exp Month"
              />
            </div>

            <div class="col">
              <!-- Year -->
              <BaseInput
                v-model="exp_year"
                class="w-full"
                :target-class="{ 'w-full': true }"
                placeholder="Exp Year"
              />
            </div>

            <div class="col">
              <!-- Code -->
              <BaseInput
                v-model="exp_month"
                class="w-full"
                :target-class="{ 'w-full': true }"
                placeholder="Sec Code"
              />
            </div>
          </div>

          <div class="btn add-account">
            <span>+</span>Add Account
          </div>
        </section>
      </form>

      <!-- Next -->
      <button 
        class="btn btn-success btn-sm px-20 border-0 shadow" 
        @click="nextStep"
      >
        Next
      </button>
    </div>
  </BaseModal>
</template>

<script>
import Arrow from '@components/Arrow'
import BankAccounts from '@components/BankAccounts'
import BaseModal from '@components/BaseModal'
import ClickOutside from 'vue-click-outside'

export default {

  directives: {
    ClickOutside,
  },

  components: {
    BaseModal,
    Arrow,
    BankAccounts
  },
  data () {
    return {
      index: 1,
      max: 2,
      amount: '',
      currency: '',
      account_number: '',
      name: '',
      exp_month: '',
      exp_year: '',
      sec_code: ''
    }
  },

  methods: {
    close () {
      this.$emit('close')
    },

    nextStep () {
      if (this.index < this.max) {
        this.index++
      }
    }
  }
}
</script>

<style lang="scss">
@import '@assets/styles/breakpoints.scss';

.modal-wrapper {
  .close {
    @apply absolute cursor-pointer text-2xl text-grey;
    top: -10px;
    right: -10px;
  }

  .steps {
    @apply flex items-center justify-center;

    @include breakpoint-max(sm) {
      @apply flex-col;
    }

    .step {
      @apply flex flex-col items-center justify-center text-base font-black text-grey-light cursor-pointer;
      width: 150px;

      @include breakpoint-max(sm) {
        @apply mb-2;
      }

      &.active {
        @apply text-green;

        .count {
          @apply bg-green text-white border-green;
        }
      }

      .count {
        @apply rounded-full border-3 border-grey-light flex items-center justify-center text-xl relative mb-2;
        height: 38px;
        width: 38px;

        svg {
          @apply absolute pin-y m-auto;
          margin-left: 20px;
          left: 100%;

          @include breakpoint-max(sm) {
            @apply hidden;
          }
        }
      }
    }
  }

  form {
    padding: 30px 0 40px;
    width: 100%;
    max-width: 587px;

    section,
    section.flex {
      @apply hidden;

      &.active {
        @apply block;
      }

      &.active.flex {
        @apply flex;
      }
    }

    .add-account {
      @apply inline-flex bg-grey border-0 px-6 text-white items-center justify-center mt-4;

      span {
        @apply text-3xl mr-6;
        height: 49px;
        margin-top: -12px;
      }
    }

    input {
      @apply bg-grey-lightest p-4 rounded my-2 border border-grey-lightest
    }

    .amount {
      @apply w-auto;

      input {
        @apply bg-grey-lightest text-5xl px-4 border-0;
        border-radius: 0;
        width: 173px;
        line-height: 80px;
      }
    }
  }
}
</style>
