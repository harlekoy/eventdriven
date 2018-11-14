<template>
	<section>

		<!-- Event Information -->
		<div class="cols py-4 mb-8">
			<div class="col half flex flex-col">
				<div class="flex items-center">
					<img class="pr-4" width="200" src="/images/events/fifa-world-cup.png">
					<h2 class="font-bold">World Cup</h2>
				</div>
				<div class="py-3">
					<h4 class="font-medium">Current Favorite: <span class="font-thin">Germany (4:1)</span></h4>
				</div>
			</div>
			<div class="col half flex items-start justify-end">
				<router-link to="/events/competition" class="btn btn-lg border-green w-min-full uppercase shadow-md">
					See FIFA World Cup
				</router-link>
			</div>
		</div>

		<!-- All Gamelines -->
		<game-line-table class="mt-5">
			<template slot="head">
				<th class="text-center">TIME</th>
				<th class="text-left">TEAM</th>
				<th class="text-left">SPREAD</th>
				<th class="text-left">MONEYLINE</th>
				<th class="text-left">TOTAL</th>
				<th class="text-center">ACTION</th>
			</template>

			<!-- tbody contents -->
			<tr class="gameday">
				<td class="text-center">
					<span class="inline-block text-sm font-medium">November 30, 2018</span>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
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
					<router-link to="/events/gameline" class="btn btn-xs border-0 btn-success-dark">
						View All
					</router-link>
				</td>
			</tr>	

			<tr class="gameday">
				<td class="text-center">
					<span class="inline-block text-sm font-medium">December 30, 2018</span>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
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
					<router-link to="/events/gameline" class="btn btn-xs border-0 btn-success-dark">
						View All
					</router-link>
				</td>
			</tr>	

		</game-line-table>          
	</section>
</template>

<script>
import GameLineTable from '@components/GameLineTable'

export default {
  data() {
    return {
    }
  },

  components: {
    GameLineTable
  }
}
</script>

