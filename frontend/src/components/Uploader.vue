<template>
<div class="flex flex-col">
  <div class="relative w-32 h-32 rounded-full flex overflow-hidden">
    <div v-if="load" class="flex items-center justify-center bg-black opacity-50 w-32 h-32 absolute rounded-full z-40">
      <BaseIcon
        class="text-white text-xl z-50"
        name="spinner"
        spin
      />
    </div>
    <LazyLoad :src="avatar">
      <img class="absolute w-full" :src="avatar" alt="">
      <div class="flex justify-center items-center w-32 h-32 bg-grey-lighter text-grey-darker" slot="placeholder">
        <BaseIcon
          class="text-xl z-50"
          name="spinner"
          spin
        />
      </div>
    </LazyLoad>
  </div>
  <a
    @click="$upload.select('profile-avatar')"
    class="text-black my-8 font-bold hover:text-green-dark"
    href="#"
  >
    <BaseIcon
      class="mr-2"
      name="camera"
    />
    Upload Picture
  </a>
</div>
</template>

<script>
import { VueClazyLoad } from 'vue-clazy-load'
import axios from 'axios'
import { mapActions, mapGetters } from 'vuex'
import { get } from 'lodash'
import { success, fail } from '@utils/toast'

export default {
  components: {
    LazyLoad: VueClazyLoad
  },

  data () {
    return {
      load: false,
    }
  },

  created() {
    this.$upload.on('profile-avatar', {
      onError(res) {
        fail({
          text: 'Error uploading avatar.'
        })
      },

      http: async (data) => {
        this.load = true
        await this.uploadAvatar(data.body)
        this.load = false

        success({
          text: 'Avatar uploaded.'
        })
      }
    })
  },

  computed: {
    ...mapGetters({
      user: 'auth/user'
    }),

    avatar () {
      let avatar = get(this.user, 'avatar')

      return avatar ? avatar : '/avatar.svg'
    }
  },

  methods: {
    ...mapActions({
      uploadAvatar: 'profile/uploadAvatar'
    })
  }
}
</script>
