
import Repo from '../Services/Repository.js';
const resource = '/products';

export default {
    get() {
        return Repo.get(`${resource}`);
    },
    getProduct(id) {
        return Repo.get(`${resource}/${id}`);
    },
    create(payload) {
        return Repo.post(`${resource}`, payload);
    },
    update(payload, id) {
        return Repo.put(`${resource}/${id}`, payload);
    },
    delete(id) {
        return Repo.delete(`${resource}/${id}`)
    },

    // MANY OTHER ENDPOINT RELATED STUFFS
};