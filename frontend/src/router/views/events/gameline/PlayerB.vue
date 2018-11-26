<template>
  <section>
    <BuyModal
      v-if="showModal" 
      @close="showModal = false"
    />
    <h2>Arsenal</h2>
    <!-- Bet for Sale -->
    <FrontTable class="mt-5">
      <template slot="head">
        <th class="text-left">
          BET TYPE
        </th>
        <th class="text-left">
          TEAM
        </th>
        <th class="text-left">
          TOTAL RETURN
        </th>
        <th class="text-left">
          PRICE
        </th>
        <th class="text-right">
          ACTION
        </th>
      </template>

      <tr>
        <td>TO WIN</td>
        <td>ARSENAL</td>
        <td>150/140</td>
        <td>300</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>ARSENAL</td>
        <td>1000/90</td>
        <td>100</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>450/130</td>
        <td>90</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>DRAW</td>
        <td>DRAW</td>
        <td>100/140</td>
        <td>90</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>450/130</td>
        <td>90</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>450/130</td>
        <td>90</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
      <tr>
        <td>TO WIN</td>
        <td>MANCHESTER UNITED</td>
        <td>450/130</td>
        <td>90</td>
        <td class="text-right">
          <button 
            class="btn btn-xs border-0 btn-success-dark" 
            @click="showModal = true"
          >
            BUY
          </button>
        </td>
      </tr>
    </FrontTable>    
  </section>
</template>

<script>
import FrontTable from '@components/FrontTable'
import BuyModal from '@components/BuyModal'

export default {

  components: {
    FrontTable,
    BuyModal
  },
  data() {
    return {
      showModal: false,
    }
  },
}
</script>

