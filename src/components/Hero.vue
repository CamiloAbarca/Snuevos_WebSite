<template>
    <section id="inicio" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-text" data-aos="fade-right">
                <h1 class="hero-title">
                    <span class="hero-title-first">Semi nuevos</span>, como nuevos
                </h1>
                <p class="hero-subtitle">
                    Marcamos la diferencia en el mercado. Unidades verificadas, sin sorpresas. Profesionales a cargo.
                </p>
                <a href="#vehiculos" class="hero-btn">Ver Vehículos</a>
            </div>

            <div class="hero-image" data-aos="fade-left">
                <img src="@/assets/logosn.png" alt="Logo Snuevos Automotive" />
            </div>
        </div>
    </section>
</template>

<script>
import AOS from 'aos'
import 'aos/dist/aos.css'

export default {
    name: "HeroView",
    mounted() {
        if (typeof window !== 'undefined') {
            AOS.init({ duration: 700, once: true })
        }
    },
    updated() {
        AOS.refresh()
    }
};
</script>

<style scoped>
/* Importación de fuentes: Montserrat para títulos, Lato para texto general */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Lato:wght@400;600&display=swap');

.hero {
    position: relative;
    /* Degradado de fondo más contrastante: Azul eléctrico a Azul medianoche intenso */
    background: #030915;
    color: #f8f8f8;
    /* Color base para texto, aunque luego se especifica más */
    overflow: hidden;
    padding: 8rem 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    /* Efecto de superposición que armoniza con el nuevo fondo */
    background: radial-gradient(circle at top right, rgba(65, 105, 225, 0.15), transparent 60%);
    pointer-events: none;
}

.hero-content {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    width: 100%;
    gap: 2rem;
    z-index: 1;
}

.hero-text {
    flex: 1;
    min-width: 300px;
}

.hero-title {
    /* Tipografía Montserrat Bold y color blanco brillante */
    font-family: 'Montserrat', sans-serif;
    font-size: 1.8rem;
    font-weight: 700;
    /* Bold */
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 1rem;
    color: #FFFFFF;
    /* Blanco brillante */
    /* No hay gradiente de texto ni italic para un look más limpio y moderno */
}

.hero-title-first {
    color: #60697a;
    /* Azul vibrante usado en tu botón y fondo */
    font-size: 1.1em;
    font-family: inherit;
    letter-spacing: 0.5px;
}

.hero-subtitle {
    /* Tipografía Lato Regular y color gris perla claro */
    font-family: 'Lato', sans-serif;
    font-size: 1.3rem;
    color: #D3DCE6;
    /* Gris perla claro */
    line-height: 1.6;
    max-width: 500px;
    font-weight: 400;
    /* Regular */
}

.hero-btn {
    display: inline-block;
    margin-top: 2.5rem;
    padding: 16px 40px;
    /* Degradado de botón vibrante: Azul cobalto a Azul zafiro */
    background: linear-gradient(135deg, #60697a 0%, #48505e 100%);
    color: #fff;
    font-family: 'Lato', sans-serif;
    font-weight: 600;
    /* Semibold */
    font-size: 1.15rem;
    border-radius: 9999px;
    text-decoration: none;
    box-shadow: 0 6px 10px rgba(132, 141, 168, 0.4);
    /* Sombra que armoniza con el botón */
    transition: all 0.3s ease;
}

.hero-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px #60697a;
    /* Degradado de hover para el botón */
    background: linear-gradient(135deg, #60697a 0%, #48505e 100%);
}

.hero-image {
    flex: 1;
    display: flex;
    justify-content: center;
}

.hero-image img {
    max-width: 450px;
    width: 100%;
    height: auto;
    /* La imagen del logo (asumiendo que es `logosn.png`) se beneficia de una sombra nítida */
    filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.6));
    /* Sombra más intensa para destacar */
    animation: elegant-pulse 3s ease-in-out infinite;
    opacity: 1;
}

@keyframes elegant-pulse {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.05);
    }

    100% {
        transform: scale(1);
    }
}

/* 📱 Responsivo */
@media (max-width: 768px) {
    .hero {
        padding: 6rem 1.5rem;
    }

    .hero-content {
        flex-direction: column;
        text-align: center;
    }

    .hero-title {
        font-size: 3rem;
        letter-spacing: 2px;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        margin: 0 auto;
    }

    .hero-image {
        justify-content: center;
    }

    .hero-image img {
        max-width: 300px;
    }

    .hero-btn {
        padding: 12px 30px;
        font-size: 1rem;
    }
}
</style>