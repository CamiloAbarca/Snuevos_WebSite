<template>
  <div id="app">
    <Navbar />
    <main class="main-content">
      <router-view /> <!-- Aquí se cargan las vistas -->
    </main>
    <Footer />
  </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "App",
  components: {
    Navbar,
    Footer,
  },
};
</script>

<style>
/* Reset básico */
html,
body,
#app {
  height: 100%;
  /* Necesario para que flex funcione correctamente */
  margin: 0;
  font-family: 'Helvetica Neue', sans-serif;
  background-color: #F8F8F8;
  color: #0A1C34;
}

/* Estructura Flex */
#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  /* Ocupa toda la pantalla */
}

/* Contenido principal que crece para empujar el footer */
.main-content {
  flex: 1;
  /* Ocupa todo el espacio disponible */
}

/* Opcional: estilos básicos de footer */
footer {
  background-color: #0a1c34;
  color: #fff;
  text-align: center;
  padding: 20px 0;
}
</style>
