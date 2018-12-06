export function getSavedState(key) {
  if (window.localStorage.getItem(key) != null) {
    return JSON.parse(window.localStorage.getItem(key))
  }

  return {}
}

export function saveState(key, state) {
  window.localStorage.setItem(key, JSON.stringify(state))
}
