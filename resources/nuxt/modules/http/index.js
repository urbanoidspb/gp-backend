import axios from 'axios'

const HTTP = axios.create({
    baseURL: 'http://92.53.97.167/api',
});

export default HTTP