<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <div class="modal-header relative">
            <slot name="header">
            </slot>
          </div>
          <slot/>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  date () {
    return {
      showModal: false
    }
  },

  created () {
    document.querySelector('body').classList.add('overflow-hidden')
  },

  destroyed () {
    document.querySelector('body').classList.remove('overflow-hidden')
  }
}
</script>

<style lang="scss">
.modal-mask {
  @apply bg-black-dark-trans flex flex-col items-center overflow-auto fixed w-full h-full pin-t pin-l justify-center;
  z-index: 9998;
  transition: opacity .3s ease;
  padding: 20px;
}

.modal-wrapper {
  @apply flex flex-col items-center w-full;
}

.modal-container {
  @apply .rounded-xl .bg-white .w-full;
  padding: 35px;
  max-width: 790px;
  margin: 0px auto 20px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h2 {
  @apply text-grey-darkest text-center;
  margin-bottom: 17px;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>

