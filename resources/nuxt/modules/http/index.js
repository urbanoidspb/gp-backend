import axios from 'axios'

const HTTP = axios.create({
    baseURL: 'http://peremen.live/api',
});

export default HTTP