import axios from 'axios'

const HTTP = axios.create({
    baseURL: 'http://92.53.97.167:81/api/',
});

export default HTTP