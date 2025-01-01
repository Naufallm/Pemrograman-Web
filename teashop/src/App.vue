<script setup>
import { ref } from 'vue'

const isOpen = ref(false)
</script>

<template>
  <div>
    <nav class="modern-nav">
      <div class="nav-container">
        <!-- Brand Section -->
        <div class="brand-section">
  <!-- Simple Leaf Icon using SVG -->
  <svg class="brand-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
    <path d="M6.5 21C4 21 2 19 2 16.5c0-3.4 3.6-7 7-7h.5c3.4 0 7 3.6 7 7 0 2.5-2 4.5-4.5 4.5h-5.5z" 
          stroke-width="2" 
          stroke-linecap="round" 
          stroke-linejoin="round"/>
  </svg>
  <span class="brand-name">Zusammen Tea</span>
</div>

        <!-- Desktop Navigation -->
        <div class="nav-links-desktop">
          <router-link :to="{ name: 'home' }" class="nav-link">
            <!-- Home Icon -->
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"/>
            </svg>
            <span>Home</span>
          </router-link>
          
          <router-link :to="{ name: 'menu.index' }" class="nav-link">
            <!-- Menu Icon -->
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M4 6h16M4 12h16M4 18h16" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"/>
            </svg>
            <span>Order</span>
          </router-link>
          
          <router-link :to="{ name: 'testimoni.index' }" class="nav-link">
            <!-- Testimoni Icon -->
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"/>
            </svg>
            <span>Testimoni</span>
          </router-link>
        </div>

        <!-- Mobile Menu Button -->
        <button 
          class="mobile-menu-btn"
          @click="isOpen = !isOpen"
          :aria-expanded="isOpen"
        >
          <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path v-if="!isOpen" 
                  d="M4 6h16M4 12h16M4 18h16" 
                  stroke-width="2" 
                  stroke-linecap="round" 
                  stroke-linejoin="round"/>
            <path v-else 
                  d="M6 18L18 6M6 6l12 12" 
                  stroke-width="2" 
                  stroke-linecap="round" 
                  stroke-linejoin="round"/>
          </svg>
        </button>
      </div>

      <!-- Mobile Navigation -->
      <div 
        class="nav-links-mobile"
        :class="{ 'is-open': isOpen }"
      >
        <router-link 
          :to="{ name: 'home' }" 
          class="mobile-link"
          @click="isOpen = false"
        >
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" 
                  stroke-width="2" 
                  stroke-linecap="round" 
                  stroke-linejoin="round"/>
          </svg>
          <span>Home</span>
        </router-link>
        
        <router-link 
          :to="{ name: 'menu.index' }" 
          class="mobile-link"
          @click="isOpen = false"
        >
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16" 
                  stroke-width="2" 
                  stroke-linecap="round" 
                  stroke-linejoin="round"/>
          </svg>
          <span>Order</span>
        </router-link>
        
        <router-link 
          :to="{ name: 'testimoni.index' }" 
          class="mobile-link"
          @click="isOpen = false"
        >
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" 
                  stroke-width="2" 
                  stroke-linecap="round" 
                  stroke-linejoin="round"/>
          </svg>
          <span>Testimoni</span>
        </router-link>
      </div>
    </nav>

    <!-- Router View -->
    <router-view></router-view>
  </div>
</template>

<style scoped>
.modern-nav {
  background: rgba(123, 92, 63, 0.95);
  backdrop-filter: blur(10px);
  padding: 1rem 0;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 4px 20px rgba(123, 92, 63, 0.15);
}

.nav-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1.5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.brand-section {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.brand-icon {
  width: 28px;
  height: 28px;
  color: #ffd5a5;
}

.brand-name {
  font-size: 1.5rem;
  font-weight: 600;
  color: white;
  text-decoration: none;
  letter-spacing: 0.5px;
}

.nav-links-desktop {
  display: none;
  gap: 2rem;
  align-items: center;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
  padding: 0.5rem 1rem;
  border-radius: 8px;
}

.nav-link:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

.nav-icon {
  width: 18px;
  height: 18px;
}

.mobile-menu-btn {
  display: flex;
  padding: 0.5rem;
  background: none;
  border: none;
  color: white;
  cursor: pointer;
}

.menu-icon {
  width: 24px;
  height: 24px;
}

.nav-links-mobile {
  display: flex;
  flex-direction: column;
  padding: 1rem;
  background: rgba(123, 92, 63, 0.98);
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease;
}

.nav-links-mobile.is-open {
  max-height: 300px;
}

.mobile-link {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  color: white;
  text-decoration: none;
  padding: 1rem;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.mobile-link:hover {
  background: rgba(255, 255, 255, 0.1);
}

.router-link-active {
  background: rgba(255, 255, 255, 0.15);
  color: #ffd5a5;
}

@media (min-width: 768px) {
  .mobile-menu-btn {
    display: none;
  }

  .nav-links-desktop {
    display: flex;
  }

  .nav-links-mobile {
    display: none;
  }
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>