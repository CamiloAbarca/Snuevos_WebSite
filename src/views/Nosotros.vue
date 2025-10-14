<template>
  <section id="nosotros" class="nosotros-section">
    <div class="nosotros-logo-center">
      <img src="@/assets/logosn.png" alt="Logo SNUEVOS" />
    </div>
    <div class="nosotros-columns">
      <div class="nosotros-col">
        <h2 class="section-title">Misión y Propósito</h2>
        <p>
          En SNUEVOS, sabemos que comprar un auto usado es una decisión importante, y no debería ser un
          riesgo. Nacimos con una misión clara: transformar la experiencia de compra de vehículos seminuevos,
          ofreciendo solo automóviles de la más alta calidad que realmente se sienten "casi nuevos". Queremos
          que sientas la misma emoción de estrenar, pero con la inteligencia de un precio justo.
        </p>
      </div>
      <div class="nosotros-col">
        <h2 class="section-title">Nuestro Valor Diferencial</h2>
        <p>
          Lo que nos distingue es nuestro compromiso inquebrantable con la transparencia y la calidad. Cada
          vehículo en nuestra selección pasa por una rigurosa inspección de [Número] puntos certificada.
          Eliminamos las sorpresas y los dolores de cabeza, garantizando que el historial, la condición
          mecánica y la documentación de tu próximo auto sean impecables. No solo vendemos autos, vendemos
          confianza y un camino asegurado.
        </p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "NosotrosView",
};
</script>

<style scoped>
/* Sección principal */
.nosotros-section {
  padding: 80px 20px;
  height: 100%;
  background-color: #0a1c34;
}

/* Logo centrado */
.nosotros-logo-center {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 40px;
}

.nosotros-logo-center img {
  max-width: 260px;
  width: 100%;
  height: auto;
  transition: max-width 0.3s ease;
}

/* Columnas flexibles */
.nosotros-columns {
  display: flex;
  flex-wrap: wrap;
  /* Permite que las columnas bajen si no caben */
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
  justify-content: center;
}

.nosotros-col {
  flex: 1 1 45%;
  /* Crece, se encoge, base 45% */
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 18px rgba(93, 112, 145, 0.10);
  padding: 32px 24px;
  min-width: 240px;
  transition: all 0.3s ease;
}

/* Títulos y textos adaptables */
.section-title {
  margin: 0 0 20px;
  font-weight: bold;
  text-align: left;
  font-size: clamp(20px, 2vw, 28px);
  /* Escala entre 20px y 28px */
}

.nosotros-col p {
  font-size: clamp(14px, 1.5vw, 16px);
  line-height: 1.6;
}

/* Media queries para tablets y móviles */
@media (max-width: 900px) {
  .nosotros-columns {
    flex-direction: column;
    gap: 24px;
  }

  .nosotros-col {
    padding: 24px 16px;
    width: 100%;
    /* Ocupa todo el ancho */
  }

  .nosotros-logo-center img {
    max-width: 200px;
    /* Ajuste para pantallas pequeñas */
  }
}

@media (max-width: 480px) {
  .nosotros-section {
    padding: 60px 16px;
  }

  .section-title {
    font-size: clamp(18px, 5vw, 24px);
  }

  .nosotros-col p {
    font-size: clamp(13px, 4vw, 15px);
  }
}
</style>
