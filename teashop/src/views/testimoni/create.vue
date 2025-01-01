<script setup>
// import ref
import { ref } from "vue";

// import router
import { useRouter } from 'vue-router';

// import api
import api from "../../api";

// init router
const router = useRouter();

// define state
const nama = ref("");
const pesan = ref("");
const errors = ref([]);

// method "storeTestimoni"
const storeTestimoni = async () => {
    // init formData
    let formData = new FormData();

    // assign state value to formData
    formData.append("nama", nama.value);
    formData.append("pesan", pesan.value);

    // store data with API
    await api.post('/api/testimoni', formData)
    .then(() => {
        // redirect
        router.push({ path: "/testimoni" });
    })
    .catch((error) => {
        // assign response error data to state "errors"
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
                            <h4 class="section-title">Add New Testimonial</h4>
                        </div>
                        <form @submit.prevent="storeTestimoni()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" v-model="nama" placeholder="Your Name">
                                <div v-if="errors.nama" class="alert alert-danger mt-2">
                                    <span>{{ errors.nama[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pesan</label>
                                <textarea class="form-control" v-model="pesan" rows="4" placeholder="Your Message"></textarea>
                                <div v-if="errors.pesan" class="alert alert-danger mt-2">
                                    <span>{{ errors.pesan[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="custom-btn">
                                <span class="btn-text">Save</span>
                                <span class="btn-icon">→</span>
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