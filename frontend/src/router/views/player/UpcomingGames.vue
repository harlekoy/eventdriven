<template>
  <section>
    <h3 class="uppercase font-bold">
      Upcoming Games
    </h3>
		
    <!-- Table -->
    <GameLineTable class="mt-5">
      <template slot="head">
        <th class="text-center">
          TIME
        </th>
        <th class="text-left">
          TEAM
        </th>
        <th class="text-left">
          SPREAD
        </th>
        <th class="text-left">
          MONEYLINE
        </th>
        <th class="text-left">
          TOTAL
        </th>
        <th class="text-center">
          ACTION
        </th>
      </template>

      <!-- tbody contents -->
      <tr class="gameday">
        <td class="text-center">
          <span class="inline-block text-sm font-medium">
            November 30, 2018
          </span>
        </td>
        <td />
        <td />
        <td />
        <td />
        <td />
      </tr>
      <tr>
        <td class="date text-center">
          <h3>14:00 GMT</h3>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>Machester United</td>
          </tr>
          <tr>
            <td>Arsenal</td>
          </tr>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>+.5(-110)</td>
          </tr>
          <tr>
            <td>+.5(-110)</td>
          </tr>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>+200</td>
          </tr>
          <tr>
            <td>-250</td>
          </tr>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>0 3.5(even)</td>
          </tr>
          <tr>
            <td>0 3.5(-120)</td>
          </tr>
        </td>
        <td class="action text-center">
          <button class="btn btn-xs border-0 btn-success-dark">
            View All
          </button>
        </td>
      </tr>	

      <tr class="gameday">
        <td class="text-center">
          <span class="inline-block text-sm font-medium">
            December 30, 2018
          </span>
        </td>
        <td />
        <td />
        <td />
        <td />
        <td />
      </tr>
      <tr>
        <td class="date text-center">
          <h3>14:30 GMT</h3>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>Machester United</td>
          </tr>
          <tr>
            <td>Arsenal</td>
          </tr>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>+.5(-110)</td>
          </tr>
          <tr>
            <td>+.5(-110)</td>
          </tr>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>+200</td>
          </tr>
          <tr>
            <td>-250</td>
          </tr>
        </td>
        <td class="child-tr-col">
          <tr>
            <td>0 3.5(even)</td>
          </tr>
          <tr>
            <td>0 3.5(-120)</td>
          </tr>
        </td>
        <td class="action text-center">
          <button class="btn btn-xs border-0 btn-success-dark">
            View All
          </button>
        </td>
      </tr>	
    </GameLineTable>
  </section>
</template>

<script>
import GameLineTable from '@components/GameLineTable'

export default {

  components: {
    GameLineTable
  },
  data() {
    return {
    }
  },
}
</script>

