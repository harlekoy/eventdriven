import Vue from 'vue'

export function success (obj = {}) {
  Vue.swal(Object.assign({
    toast: true,
    width: 350,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    type: 'success',
    title: 'Success!',
    text: 'it\'s a good day!'
  }, obj))
}

export function modal (obj = {}) {
  Vue.swal(Object.assign({
    toast: false,
    width: 450,
    height: 550,
    position: 'center',
    showConfirmButton: true,
    timer: false,
    type: 'question',
    title: 'Confirm Action',
    text: 'it\'s a good day!',
  }, obj))
}

export function fail (obj = {}) {
  Vue.swal(Object.assign({
    toast: true,
    width: 450,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    type: 'error',
    title: 'Oops...',
    text: 'Something went wrong!'
  }, obj))
}
