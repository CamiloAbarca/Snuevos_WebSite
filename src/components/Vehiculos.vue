<template>
    <section id="vehiculos" class="container flex-section">
        <div class="left">
            <h2 class="section-title">El Seminuevo que buscas está aquí.</h2>
        </div>
        <div class="right">
            <p>
                Tenemos una amplia y dinámica selección de autos de calidad comprobada para que elijas el que mejor se adapte
                a tu vida y a tu presupuesto. Desde sedanes familiares hasta SUVs y camionetas: si buscas un excelente
                negocio con la tranquilidad de un auto confiable, estás en el lugar correcto.

                ¡No dejes escapar la oportunidad!

                Explora ahora todos nuestros vehículos disponibles, usa nuestros filtros de búsqueda y comienza a manejar tu
                próximo auto.
            </p>
            <router-link to="/catalogo">
                <b-button class="btn-cta">Ver Catálogo</b-button>
            </router-link>
        </div>
    </section>
</template>

<script>
export default {
    name: "VehiculosView",
};
</script>

<style scoped>
.flex-section {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    min-height: 60vh;
    /* Elimina el centrado vertical si quieres que el contenido esté más arriba */
    padding-top: 40px; /* Opcional: agrega espacio arriba */
}

.left {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Alinea arriba */
    align-items: center;
}

.right {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: left;
}

.section-title {
    margin: 10px 0 30px;
    font-weight: 900;
    text-align: center;
    font-size: 2.5rem; /* Más grande */
    letter-spacing: 2px; /* Espaciado entre letras */
    color: #030915; /* Color destacado */
    text-transform: uppercase;
    text-shadow: 2px 4px 12px rgba(93, 112, 145, 0.18);
}

.btn-cta {
    background-color: #4c5b75;
    color: #F8F8F8;
    border: none;
    margin-top: 20px;
}

.btn-cta:hover {
    background-color: #030915;
}

@media (max-width: 900px) {
    .flex-section {
        flex-direction: column;
        gap: 24px;
        padding-top: 24px;
        min-height: 40vh;
    }
    .left, .right {
        align-items: center;
        text-align: center;
        padding: 0 12px;
    }
    .section-title {
        font-size: 2rem;
    }
}

@media (max-width: 600px) {
    .flex-section {
        gap: 12px;
        padding-top: 12px;
    }
    .section-title {
        font-size: 1.3rem;
    }
    .btn-cta {
        font-size: 1rem;
        padding: 10px 18px;
    }
}
</style>