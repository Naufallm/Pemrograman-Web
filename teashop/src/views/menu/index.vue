<script setup>
import { ref, onMounted } from 'vue';
import api from '../../api';

const menu = ref([]);

const fetchDataMenu = async () => {
    await api.get('/api/menu')
    .then(response => {
        menu.value = response.data.data.data;
    });
}

onMounted(() => {
    fetchDataMenu();
});

const deleteMenu = async (id) => {
    await api.delete(`/api/menu/${id}`)
    .then(() => {
        fetchDataMenu();
    });
};
</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Section -->
                <div class="header-section mb-4">
                    <h2 class="section-title">Menu Orders</h2>
                    <router-link :to="{ name: 'menu.create' }" class="custom-btn">
                        <span class="btn-text">Add New Order</span>
                        <span class="btn-icon">+</span>
                    </router-link>
                </div>

                <!-- Main Card -->
                <div class="custom-card">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Menu</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Level Sugar</th>
                                        <th scope="col">Temperature</th>
                                        <th scope="col" style="width:15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="menu.length == 0">
                                        <td colspan="5" class="text-center">
                                            <div class="empty-state">
                                                <span class="empty-state-icon">📝</span>
                                                <p class="empty-state-text">No orders available yet!</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(item, index) in menu" :key="index" class="menu-item-row">
                                        <td>{{ item.product_name }}</td>
                                        <td>{{ item.quantity }}</td>
                                        <td>
                                            <span class="sugar-level-badge">
                                                {{ item.level_sugar }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="temperature-badge">
                                                {{ item.temperature }}
                                            </span>
                                        </td>
                                        <td class="action-buttons">
                                            <router-link 
                                                :to="{ name: 'menu.edit', params:{id: item.id} }" 
                                                class="btn-action edit"
                                            >
                                                Edit
                                            </router-link>
                                            <button 
                                                @click.prevent="deleteMenu(item.id)" 
                                                class="btn-action delete"
                                            >
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
/* Header Styles */
.header-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-title {
    color: #7b5c3f;
    font-weight: 600;
    margin: 0;
}

/* Card Styles */
.custom-card {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(123, 92, 63, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: transform 0.3s ease;
}

.custom-card:hover {
    transform: translateY(-2px);
}

/* Button Styles */
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

.btn-text {
    font-weight: 500;
}

.btn-icon {
    font-size: 1.2em;
    line-height: 1;
}

/* Table Styles */
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

.menu-item-row {
    transition: transform 0.2s ease;
}

.menu-item-row:hover td {
    background: #fdf6ed;
}

/* Badge Styles */
.sugar-level-badge, .temperature-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.9em;
    font-weight: 500;
}

.sugar-level-badge {
    background: #e6f3ff;
    color: #0066cc;
}

.temperature-badge {
    background: #fff0e6;
    color: #ff6600;
}

/* Action Buttons */
.action-buttons {
    white-space: nowrap;
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
    cursor: pointer;
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
    color: white;
}

/* Empty State */
.empty-state {
    padding: 30px;
    background: #fff5f5;
    border-radius: 10px;
    text-align: center;
}

.empty-state-icon {
    font-size: 2em;
    margin-bottom: 10px;
    display: block;
}

.empty-state-text {
    color: #7b5c3f;
    font-weight: 500;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .header-section {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .custom-btn {
        width: 100%;
        justify-content: center;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .btn-action {
        width: 100%;
        text-align: center;
        margin: 0;
    }

    .custom-table {
        font-size: 0.9em;
    }
}
</style>