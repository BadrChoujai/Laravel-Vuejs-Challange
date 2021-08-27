
import instance from '../Services/Repository.js';
const resource = '/api/login';

export default {
    get() {
        return instance.get(`${resource}`);
    },
    getProduct(id) {
        return instance.get(`${resource}/${id}`);
    },
    Post(payload) {
        return instance.post(`${resource}`, payload);
    },
    update(payload, id) {
        return instance.put(`${resource}/${id}`, payload);
    },
    delete(id) {
        return instance.delete(`${resource}/${id}`)
    },

    // MANY OTHER ENDPOINT RELATED STUFFS
};