<template>
  <section>
    <h2>Manchester United</h2>

    <!-- Bet for Sale -->
    <front-table class="mt-5">
      <template slot="head">
        <th class="text-left">BET TYPE</th>
        <th class="text-left">TEAM</th>
        <th class="text-left">TOTAL RETURN</th>
        <th class="text-left">PRICE</th>
        <th class="text-right">ACTION</th>
      </template>

      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>100/140</td>
        <td>120</td>
        <td class="text-right"><button class="btn btn-xs border-0 btn-success-dark">BUY</button></td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>130/120</td>
        <td>140</td>
        <td class="text-right"><button class="btn btn-xs border-0 btn-success-dark">BUY</button></td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>150/130</td>
        <td>120</td>
        <td class="text-right"><button class="btn btn-xs border-0 btn-success-dark">BUY</button></td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>ARSENAL</td>
        <td>100/110</td>
        <td>50</td>
        <td class="text-right"><button class="btn btn-xs border-0 btn-success-dark">BUY</button></td>
      </tr>
    </front-table>    
  </section>
</template>

<script>
import FrontTable from '@components/FrontTable'

export default {
  data() {
    return {

    }
  },

  components: {
    FrontTable
  }
}
</script>

