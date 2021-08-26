import Axios from "axios";

const baseUrl = "https://prod-active.test";
const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYyOTU0ODc0MCwiZXhwIjoxNjI5NTUyMzQwLCJuYmYiOjE2Mjk1NDg3NDAsImp0aSI6InNqczllWXZ6TlBZTFVacFMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.ORoLjyGqaYGv1_BHWP_KGdCDc9Yd5aLngl0WahrbSIY";

const instance = Axios.create({
    baseURL,
    headers: {
        Authorization: "Bearer " + token
    }
}); 

instnace.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default instance;