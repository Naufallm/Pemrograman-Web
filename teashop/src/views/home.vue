<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function navigateToMenu() {
  router.push({ name: 'menu.index' });
}
</script>

<template>
  <div class="hero-container">
    <!-- Background Elements -->
    <div class="animated-bg"></div>
    
    <!-- Content Section -->
    <div class="content-wrapper">
      <div class="brand-title">
        <span class="brand-highlight">ZUSAMMEN</span>
        <span class="tea-shop">TEA SHOP</span>
      </div>
      
      <div class="tagline-container">
        <h2 class="tagline">RASAKAN BEDANYA</h2>
      </div>

      <!-- Decorative Elements -->

      <!-- CTA Button -->
      <button @click="navigateToMenu" class="order-button">
        <span class="button-text">Order Now</span>
        <span class="button-icon">→</span>
      </button>
    </div>
  </div>
</template>

<style scoped>
.hero-container {
  position: relative;
  min-height: 80vh;
  overflow: hidden;
  background: linear-gradient(135deg, #f6e6cb 0%, #ffd5a5 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
}

.content-wrapper {
  position: relative;
  z-index: 2;
  text-align: center;
  max-width: 800px;
}

.brand-title {
  font-size: clamp(2.5rem, 8vw, 5rem);
  line-height: 1.2;
  margin-bottom: 1.5rem;
  font-weight: 800;
}

.brand-highlight {
  color: #7b5c3f;
  display: block;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.tea-shop {
  color: #9c7853;
  display: block;
  font-size: 0.8em;
}

.tagline-container {
  margin-bottom: 3rem;
  position: relative;
}

.tagline {
  color: #5a4532;
  font-size: clamp(1.2rem, 4vw, 2rem);
  font-weight: 500;
  letter-spacing: 2px;
  margin-bottom: 0.5rem;
}

.tagline-underline {
  width: 100px;
  height: 3px;
  background: #7b5c3f;
  margin: 1rem auto;
  position: relative;
}

.tagline-underline::after {
  content: '';
  position: absolute;
  width: 50%;
  height: 100%;
  background: #9c7853;
  left: 25%;
  animation: underlinePulse 2s infinite;
}


.order-button {
  background: #7b5c3f;
  color: white;
  border: none;
  padding: 1rem 2.5rem;
  font-size: 1.2rem;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  box-shadow: 0 4px 15px rgba(123, 92, 63, 0.2);
}

.button-text {
  position: relative;
  z-index: 1;
}

.button-icon {
  transition: transform 0.3s ease;
}

.order-button:hover {
  background: #9c7853;
  transform: translateY(-2px);
}

.order-button:hover .button-icon {
  transform: translateX(5px);
}

@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 0.5; }
  50% { transform: scale(1.05); opacity: 0.7; }
}

@keyframes floating {
  0%, 100% { transform: translate(0, 0) rotate(0deg); }
  50% { transform: translate(10px, 15px) rotate(5deg); }
}

@keyframes underlinePulse {
  0%, 100% { transform: scaleX(1); }
  50% { transform: scaleX(1.5); }
}

@media (max-width: 768px) {
  .hero-container {
    padding: 1rem;
    min-height: 60vh;
  }

  .content-wrapper {
    padding: 2rem 1rem;
  }

  .order-button {
    width: 100%;
    justify-content: center;
    padding: 1rem;
  }
}
</style>