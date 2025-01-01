<script setup>
    import { ref, onMounted } from "vue";
    import { useRouter, useRoute } from 'vue-router';
    import api from "../../api";

    const router = useRouter();
    const route = useRoute();

    const product_name = ref("");
    const quantity = ref("");
    const level_sugar = ref("");
    const temperature = ref("");
    const errors = ref([]);

    onMounted(async () => {
        await api.get(`/api/menu/${route.params.id}`)
        .then(response => {
            product_name.value = response.data.data.product_name;
            quantity.value = response.data.data.quantity;
            level_sugar.value = response.data.data.level_sugar;
            temperature.value = response.data.data.temperature;
        });
    });

    const updateMenu = async () => {
        let formData = new FormData();

        formData.append("product_name", product_name.value);
        formData.append("quantity", quantity.value);
        formData.append("level_sugar", level_sugar.value);
        formData.append("temperature", temperature.value);
        formData.append("_method", "PATCH");

        await api.post(`/api/menu/${route.params.id}`, formData)
        .then(() => {
            router.push({ path: "/menu" });
        })
        .catch((error) => {
            errors.value = error.response.data;
        });
    };
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-card">
                    <div class="card-body">
                        <div class="header-section mb-4">
                            <h4 class="section-title">Update Menu Item</h4>
                        </div>
                        <form @submit.prevent="updateMenu()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Product Menu</label>
                                <input type="text" class="form-control" v-model="product_name" placeholder="Product Menu">
                                <div v-if="errors.product_name" class="alert alert-danger mt-2">
                                    <span>{{ errors.product_name[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" class="form-control" v-model="quantity" placeholder="Quantity">
                                <div v-if="errors.quantity" class="alert alert-danger mt-2">
                                    <span>{{ errors.quantity[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Level Sugar</label>
                                <select class="form-control" v-model="level_sugar">
                                    <option value="">Select Sugar Level</option>
                                    <option value="no sugar">No Sugar</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                <div v-if="errors.level_sugar" class="alert alert-danger mt-2">
                                    <span>{{ errors.level_sugar[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Temperature</label>
                                <select class="form-control" v-model="temperature">
                                    <option value="">Select Temperature</option>
                                    <option value="cold">Cold</option>
                                    <option value="warm">Warm</option>
                                    <option value="hot">Hot</option>
                                </select>
                                <div v-if="errors.temperature" class="alert alert-danger mt-2">
                                    <span>{{ errors.temperature[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="custom-btn">
                                <span class="btn-text">Update Menu</span>
                                <span class="btn-icon">↑</span>
                            </button>
                        </form>
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
    padding: 2rem;
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

/* Form Styles */
.form-control {
    border: 1px solid rgba(123, 92, 63, 0.2);
    border-radius: 8px;
    padding: 12px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #7b5c3f;
    box-shadow: 0 0 0 0.2rem rgba(123, 92, 63, 0.25);
}

.form-label {
    color: #7b5c3f;
    margin-bottom: 0.5rem;
}

/* Alert Styles */
.alert-danger {
    background: #fff5f5;
    border: none;
    border-radius: 8px;
    color: #dc3545;
    padding: 0.75rem 1rem;
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

    .custom-card {
        padding: 1rem;
    }
}
</style>