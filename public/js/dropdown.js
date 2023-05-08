
import axios from './lib/axios/axios.min.js'

export default () => ({
  open: false,
  async callApi() {
   try {
    const res = await axios.get('https://dog.ceo/api/breeds/list/all');
    console.log(res.data)
   } catch (error) {
    console.log(error)
   }
  },
  toggle() {
      this.open = ! this.open;
      this.callApi()
  }
})