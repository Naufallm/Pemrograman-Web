<script setup>
import { ref, onMounted } from 'vue';
import api from '../../api';

const testimoni = ref([]);

const fetchDataTestimoni = async () => {
    await api.get('/api/testimoni')
    .then(response => {
        testimoni.value = response.data.data.data;
    });
}

onMounted(() => {
    fetchDataTestimoni();
});

const deleteTestimoni = async (id) => {
    await api.delete(`/api/testimoni/${id}`)
    .then(() => {
        fetchDataTestimoni();
    })
};
</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'testimoni.create' }" class="custom-btn mb-4">
                    <span class="btn-text">Add New Testimoni</span>
                    <span class="btn-icon">+</span>
                </router-link>
                
                <div class="custom-card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col" style="width:15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="testimoni.length == 0">
                                        <td colspan="3" class="text-center">
                                            <div class="empty-state">
                                                Data Belum Tersedia!
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(item, index) in testimoni" :key="index">
                                        <td>{{ item.nama }}</td>
                                        <td>{{ item.pesan }}</td>
                                        <td class="text-center">
                                            <router-link :to="{ name: 'testimoni.edit', params:{id: item.id} }" class="btn-action edit">
                                                Edit
                                            </router-link>
                                            <button @click.prevent="deleteTestimoni(item.id)" class="btn-action delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.custom-card {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(123, 92, 63, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.custom-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #7b5c3f;
    color: white;
    padding: 12px 24px;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(123, 92, 63, 0.2);
}

.custom-btn:hover {
    background: #9c7853;
    transform: translateY(-2px);
    color: white;
}

.btn-icon {
    font-size: 1.2em;
    line-height: 1;
}

.custom-table {
    border-collapse: separate;
    border-spacing: 0 8px;
    margin-top: -8px;
}

.custom-table thead tr {
    background: #7b5c3f;
    color: white;
}

.custom-table th {
    padding: 15px;
    font-weight: 600;
    border: none;
}

.custom-table td {
    padding: 15px;
    background: white;
    border: none;
    vertical-align: middle;
}

.custom-table tr:hover td {
    background: #fdf6ed;
}

.btn-action {
    padding: 8px 16px;
    border-radius: 30px;
    border: none;
    font-size: 0.9em;
    margin: 0 4px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.edit {
    background: #7b5c3f;
    color: white;
}

.edit:hover {
    background: #9c7853;
    color: white;
}

.delete {
    background: #dc3545;
    color: white;
}

.delete:hover {
    background: #bb2d3b;
}

.empty-state {
    padding: 20px;
    background: #fff5f5;
    color: #dc3545;
    border-radius: 10px;
    font-weight: 500;
}

/* Apply the same styling to menu/index.vue table */
</style>