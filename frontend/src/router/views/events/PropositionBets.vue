<template>
	<section>
		<h3 class="uppercase font-bold">Proposition Bets</h3>
		
		<!-- Bet for Sale -->
		<FrontTable class="mt-5">
			<template slot="head">
				<th class="text-left">
					Label A
				</th>
				<th class="text-left">
					Label B
				</th>
				<th class="text-left">
					Label C
				</th>
				<th class="text-left">
					Label D
				</th>
				<th class="text-left">
					Label E
				</th>
			</template>

			<tr>
				<td>Text A</td>
				<td>Text B</td>
				<td>Text C</td>
				<td>Text D</td>
				<td>Text E</td>
			</tr>
			<tr>
				<td>Text A</td>
				<td>Text B</td>
				<td>Text C</td>
				<td>Text D</td>
				<td>Text E</td>
			</tr>
			<tr>
				<td>Text A</td>
				<td>Text B</td>
				<td>Text C</td>
				<td>Text D</td>
				<td>Text E</td>
			</tr>
			<tr>
				<td>Text A</td>
				<td>Text B</td>
				<td>Text C</td>
				<td>Text D</td>
				<td>Text E</td>
			</tr>
		</FrontTable>        
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
    FrontTable,
  }
}
</script>

