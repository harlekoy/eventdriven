<template>
  <div class="uploader">

    <!-- Wrapper -->
    <div class="avatar-wrapper">

      <!-- Loader -->
      <div v-if="load" class="loader">
        <BaseIcon name="spinner" spin/>
      </div>

      <!-- Image -->
      <LazyLoad :src="avatar">
        <img :src="avatar"/>
        <div slot="placeholder" class="placeholder">
          <BaseIcon name="spinner" spin/>
        </div>
      </LazyLoad>

    </div>

    <!-- Label -->
    <a class="label text font-semibold cursor-pointer" @click="$upload.select('profile-avatar')">
      <BaseIcon name="camera"/>
      Upload Picture
    </a>

  </div>
</template>

<script>
import { VueClazyLoad } from 'vue-clazy-load'
import { mapActions, mapGetters } from 'vuex'
import { get } from 'lodash'
import { success, fail } from '@utils/toast'

export default {
  components: {
    LazyLoad: VueClazyLoad
  },

  data () {
    return {
      load: false
    }
  },

  created () {
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

      return avatar || '/avatar.svg'
    }
  },

  methods: {
    ...mapActions({
      uploadAvatar: 'profile/uploadAvatar'
    })
  }
}
</script>

<style lang="scss">
  @import '@assets/styles/modules/_breakpoints.scss';
  @import '@assets/styles/modules/_uploader.scss';
</style>
