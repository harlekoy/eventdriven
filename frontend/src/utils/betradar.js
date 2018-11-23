import store from '@state/store'
import { filter, get } from 'lodash'

/**
 * @id 
 * sport_id ex: sr:sport:6
 *
 * returns specific tournament
 */
export function tournament ( id ) {
  let sport_id    = brTrim( id )
  let tournaments = store.getters['sports/tournaments']

  return filter( tournaments, function( item ) {
    let sport_ID = brTrim( item.sport_id )
    return sport_ID == sport_id ? item : ''
   });
}


/**
 * @id 
 * sport_id ex: sr:sport:24
 *
 * returns match team
 */
export function team ( id ) {
  let teams    = store.getters['teams/sportTeams']
  return get(teams, id, [])
}

/**
 * @id 
 * trims sport_id ex: sr:sport:24
 *
 * returns id
 */
export function brTrim (id) {
  let rawId  = id + ''
  let values = rawId.split(':')
  let value  = values.pop()
  return value
}
  