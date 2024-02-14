<template>
  <header>
    <!-- <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div> -->
  </header>
  <main>
    <router-view v-slot="{ Component, route }">
      <transition :name="route.meta.transition">
        <component :is="Component" :key="route.meta.pageChanged" />
      </transition>
    </router-view>
    <div v-if="scrolled" @click="scrollToTop()" class="rk_arrow_circle light to_top">
      <span class="rk_arrow"></span><span class="rk_circle"></span>
    </div>
  </main>
</template>
<script setup>
import { onMounted, ref } from 'vue'

const scrolled = ref(false)
const userScroll = () => {
  if (window.scrollY > 0) {
    scrolled.value = true
  } else {
    scrolled.value = false
  }
}
onMounted(() => {
  window.addEventListener('scroll', userScroll)
})
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}
</script>

<style scoped>
main {
  position: relative;
  overflow-x: hidden;
  overflow-y: auto;
  min-height: 100vh;
  max-width: 100vw;
  width: 100%;
  .to_top {
    position: fixed;
    cursor: pointer;
    bottom: 50px;
    right: 20px;
    transform: rotate(-90deg);
  }
}
.formations-enter-from {
  transform: translateX(-100vw);
  left: 0;
  width: 100vw;
  top: 0;
}
.formations-enter-active,
.formations-leave-active {
  position: absolute;
  width: 100vw;
  transition: all 0.4s ease-in;
}

.formations-enter-active {
  top: 0;
}
.formations-leave-active {
  bottom: 0;
}
.formations-leave-to {
  left: 100vw;
}

.formations-leave-from {
  left: 0vw;
}

.tourisme-enter-from {
  transform: translateX(100vw);
  right: 0;
  width: 100vw;
  top: 0;
}
.tourisme-enter-active,
.tourisme-leave-active {
  position: absolute;

  width: 100vw;
  transition: all 0.4s ease-in;
}
.tourisme-enter-active {
  top: 0;
}
.tourisme-leave-active {
  bottom: 0;
}
.tourisme-leave-to {
  right: 100vw;
}

.tourisme-leave-from {
  right: 0vw;
}

/* // back home  */
.formations-home-slide-enter-active,
.formations-home-slide-leave-active {
  transition: all 1s ease-out;
  transform: translateX(-100vw);
}

.formations-home-slide-enter-from {
  transform: translateX(-100vw);
}

.formations-home-slide-enter-to {
  transform: translateX(0vw);
}

.formations-home-slide-leave-from {
  transform: translateX(0vw);
}

.formations-home-slide-leave-to {
  transform: translateX(-100vw);
}

.tourisme-home-slide-enter-active,
.tourisme-home-slide-leave-active {
  position: absolute;
  transition: all 0.85s ease;
}

.tourisme-home-slide-enter-from {
  left: -100%;
}

.tourisme-home-slide-enter-to {
  left: 0%;
}

.tourisme-home-slide-leave-from {
  transform: scale(1);
}

.tourisme-home-slide-leave-to {
  transform: scale(0.8);
}

header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
