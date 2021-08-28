import Axios from "axios";
import Auth from "../auth";

const baseUrl = "http://localhost:8000";
const token = Auth.user.token;

const instance = Axios.create({
    baseUrl,
    headers: {
        Authorization: "Bearer " + token
    }
}); 

instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default instance;