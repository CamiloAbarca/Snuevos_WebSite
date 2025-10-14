<template>
    <div class="tipos-container">
        <h1>Tipos de Vehículos</h1>
        <div class="cards-container">
            <div class="card" v-for="(vehiculo, index) in vehiculos" :key="index">
                <!-- Icono -->
                <div class="icon" v-html="vehiculo.icon"></div>
                <h2>{{ vehiculo.titulo }}</h2>
                <p>{{ vehiculo.descripcion }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TiposView",
    data() {
        return {
            vehiculos: [
                {
                    titulo: "Sedán",
                    descripcion: "Autos cómodos y eficientes para la ciudad.",
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#0a1c34" viewBox="0 0 24 24"><path d="M4 12h16l-1.5 6h-13L4 12zm0-2V6h16v4H4z"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>`,
                },
                {
                    titulo: "SUV",
                    descripcion: "Espaciosos, ideales para familia y aventura.",
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#0a1c34" viewBox="0 0 24 24"><path d="M2 12l2-5h16l2 5v7h-2v-2H4v2H2v-7z"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>`,
                },
                {
                    titulo: "Pick-up",
                    descripcion: "Potencia y capacidad de carga.",
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#0a1c34" viewBox="0 0 24 24"><path d="M3 12l3-6h12l3 6v6h-2v-2H5v2H3v-6z"/><circle cx="6" cy="17" r="2"/><circle cx="18" cy="17" r="2"/></svg>`,
                },
                {
                    titulo: "Coupé",
                    descripcion: "Diseño deportivo y rendimiento.",
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#0a1c34" viewBox="0 0 24 24"><path d="M3 12l3-6h12l3 6v6h-2v-2H5v2H3v-6z"/><circle cx="6" cy="17" r="2"/><circle cx="18" cy="17" r="2"/></svg>`,
                },
                {
                    titulo: "Híbrido/Eléctrico",
                    descripcion: "Tecnología y ahorro de energía.",
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#0a1c34" viewBox="0 0 24 24"><path d="M6 12l-1 2h16l-1-2H6z"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>`,
                },
            ],
        };
    },
};
</script>

<style scoped>
.tipos-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

h1 {
    text-align: center;
    margin-bottom: 40px;
    font-family: 'Montserrat', Arial, sans-serif;
    color: #030915;
}

.cards-container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    flex: 1 1 200px;
    max-width: 220px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.icon {
    margin-bottom: 15px;
}

.card h2 {
    margin: 10px 0;
    font-size: 1.2rem;
    color: #0a1c34;
}

.card p {
    font-size: 0.9rem;
    color: #444;
    line-height: 1.4;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

@media (max-width: 1024px) {
    .card {
        flex: 1 1 180px;
        max-width: 200px;
    }
}

@media (max-width: 768px) {
    .cards-container {
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .card {
        width: 80%;
        max-width: 300px;
    }
}
</style>
