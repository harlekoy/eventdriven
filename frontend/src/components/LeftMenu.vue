<template>
  <div class="left">
    <router-link
      :to="{ name: 'home' }"
      class="logo"
    >
      <Logo :width="162" />
    </router-link>
    <div class="item">
      Buy
      <i class="icon-down" />
      <div class="menu-dropdown">
        <div class="parent">
          <div class="item active" @mouseenter="showInnerMenu">
            Basketball
            <i class="icon-down" />

            <div class="inner">
              <section>
                <p><b>EVENTS</b></p>
                <div class="items">
                  <div class="item">NFL Playoffs</div>
                  <div class="item">Superbowl</div>
                </div>
                <div class="bg-green"></div>
              </section>
              <section>
                <p><b>TEAMS</b></p>
                <div class="items">
                  <div class="item">Buffallo Bills</div>
                  <div class="item">LA Rams</div>
                  <div class="item">Carolina Panthers</div>
                  <div class="item">Miami Dolphins</div>
                  <div class="item">Chicago Bears</div>
                  <div class="item">Minnesota Vikings</div>
                  <div class="item">Cincinnati Bengals</div>
                  <div class="item">New Orleans Saints</div>
                  <div class="item">Cleveland Browns</div>
                  <div class="item">New York Giants</div>
                  <div class="item">Dallas Cowboys</div>
                  <div class="item">New York Jets</div>
                  <div class="item">Denver Broncos</div>
                  <div class="item">Philadelphia Eagles</div>
                  <div class="item">Houston Texans</div>
                  <div class="item">Pittsburgh Steelers</div>
                  <div class="item">Kansas City Chiefs</div>
                  <div class="item">San Francisco 49ers</div>
                </div>
              </section>
            </div>
          </div>
          <div class="item" @mouseenter="showInnerMenu">
            Baseball
            <i class="icon-down" />
            <div class="inner"></div>
          </div>
          <div class="item" @mouseenter="showInnerMenu">
            Football
            <i class="icon-down" />
            <div class="inner"></div>
          </div>
          <div class="item" @mouseenter="showInnerMenu">
            Tennis
            <i class="icon-down" />
            <div class="inner"></div>
          </div>
        </div>
        <div ref="child" class="child">
          <section>
            <p><b>EVENTS</b></p>
            <div class="items">
              <div class="item">NFL Playoffs</div>
              <div class="item">Superbowl</div>
            </div>
            <div class="bg-green"></div>
          </section>
          <section>
            <p><b>TEAMS</b></p>
            <div class="items">
              <div class="item">Buffallo Bills</div>
              <div class="item">LA Rams</div>
              <div class="item">Carolina Panthers</div>
              <div class="item">Miami Dolphins</div>
              <div class="item">Chicago Bears</div>
              <div class="item">Minnesota Vikings</div>
              <div class="item">Cincinnati Bengals</div>
              <div class="item">New Orleans Saints</div>
              <div class="item">Cleveland Browns</div>
              <div class="item">New York Giants</div>
              <div class="item">Dallas Cowboys</div>
              <div class="item">New York Jets</div>
              <div class="item">Denver Broncos</div>
              <div class="item">Philadelphia Eagles</div>
              <div class="item">Houston Texans</div>
              <div class="item">Pittsburgh Steelers</div>
              <div class="item">Kansas City Chiefs</div>
              <div class="item">San Francisco 49ers</div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="item">
      Sell
      <i class="icon-down" />
    </div>
  </div>
</template>

<script>
import Logo from '@components/Logo'
import { forEach } from 'lodash'

export default {
  components: {
    Logo
  },

  methods: {
    showInnerMenu (e) {
      const all = document.querySelectorAll('.menu-dropdown > .parent > .item')
      const target =  e.target

      forEach(all, (item) => {
        item.classList.remove('active')
      })

      target.classList.add('active')
      this.$refs.child.innerHTML = target.querySelector('.inner').innerHTML
    }
  }
}
</script>

<style lang="scss">
.menu-dropdown {
  @apply absolute pin-l shadow overflow-hidden hidden;
  top: 100%;
  margin-top: 5px;
  width: 704px;
  height: 411px;

  &::after {
    @apply absolute pin-t pin-x;
    box-shadow: 0 -3px 10px 1px config('colors.black');
    content: '';
  }

  > .parent {
    @apply absolute pin-l bg-green pin-y;
    padding: 17px 0;
    width: 178px;

    > .item {
      @apply text-white leading-loose text-base relative;
      padding: 0 20px;

      > .icon-down {
        @apply text-white absolute pin-y m-auto;
        font-style: normal;
        transform: rotate(-90deg);
        font-size: 8px;
        right: 14px;
      }

      &:hover,
      &.active {
        @apply bg-green-darkest;
      }

      > .inner {
        @apply hidden;
      }
    }
  }

  > .child {
    @apply pin-r pin-y bg-white absolute overflow-auto;
    width: 526px;
    padding-bottom: 10px;

    > section {
      padding: 23px 0 0;

      &:last-child {
        @apply border-0;
      }

      > p {
        @apply text-black;
        margin-bottom: 23px;
        padding: 0 25px 0 20px;
      }

      > .items {
        @apply flex flex-wrap;

        + .bg-green {
          height: 1px;
          margin: 13px 30px 0 20px;
        }

        > .item {
          @apply text-green w-1/2 text-sm;
          line-height: 31px;
          padding: 0 30px 0 20px;

          &:hover {
            @apply text-black bg-grey-lighter;
          }
        }
      }
    }
  }
}
</style>
