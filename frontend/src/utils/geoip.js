import axios from 'axios'

export async function geoip () {
  const { data } = await axios.get('https://api.ipgeolocation.io/ipgeo?apiKey='+process.env.VUE_APP_IPGEO_API)

  return data
}
