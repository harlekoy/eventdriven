import store from '@state/store'
import { srTrim } from '@/src/utils/trim'
import { filter } from 'lodash'

export function tournament ( id ) {

  let sport_id    = srTrim( id )
  let tournaments = store.getters['sports/tournaments']

  return _.filter( tournaments, function( item ) { 
    let sport_ID = srTrim( item.sport_id )

    return sport_ID == sport_id ? item : ''

   });
}
  