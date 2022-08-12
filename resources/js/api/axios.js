import Axios from "axios"

console.log(Axios);

let api = Axios.create({
    baseURL: '/api',
    headers: {
        Authorization: `Bearer ${localStorage.getItem('token')}`
    }
})

export default api
