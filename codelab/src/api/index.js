// Import axios
import axios from 'axios';

// Membuat instance axios dengan konfigurasi URL API Laravel (modul 5)
const Api = axios.create({
  baseURL: 'http://localhost:8000' // Samakan dengan URL API Laravel
});

// Ekspor instance Api untuk digunakan di file lain
export default Api;
    