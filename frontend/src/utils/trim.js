
export function srTrim (id) {
  let rawId  = id + ''
  let values = rawId.split(':')
  
  return values.pop()
}
    