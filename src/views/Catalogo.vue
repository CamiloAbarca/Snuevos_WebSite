<template>
    <div class="container py-5">
        <h2 class="text-center mb-4">Catálogo de Vehículos</h2>
        <b-row>
            <b-col cols="12" md="4" v-for="(auto, index) in autos" :key="index">
                <b-card :title="auto.nombre" :img-src="auto.imagen" img-alt="auto.nombre" img-top
                    class="mb-4 shadow-sm">
                    <b-card-text>
                        <strong>Precio: </strong> {{ auto.precio }}
                    </b-card-text>
                    <b-button variant="primary" class="btn-cta">Más Información</b-button>
                </b-card>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name: "CatalogoView",
    data() {
        return {
            autos: [
                {
                    nombre: "BMW Serie 3",
                    precio: "$40,000",
                    imagen: "https://source.unsplash.com/400x300/?bmw,car"
                },
                {
                    nombre: "Audi A4",
                    precio: "$38,500",
                    imagen: "https://source.unsplash.com/400x300/?audi,car"
                },
                {
                    nombre: "Mercedes C-Class",
                    precio: "$42,000",
                    imagen: "https://source.unsplash.com/400x300/?mercedes,car"
                }
            ]
        };
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');

.container {
    max-width: 1200px;
    margin: 0 auto;
    background: linear-gradient(120deg, #f8f8f8 60%, #e3eafc 100%);
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(93, 112, 145, 0.10);
    font-family: 'Montserrat', Arial, sans-serif;
    padding: 48px 32px;
}

.text-center {
    font-family: 'Montserrat', Arial, sans-serif;
    font-weight: 700;
    font-size: 2.3rem;
    color: #5D7091;
    letter-spacing: 1px;
    margin-bottom: 32px;
}

.b-row {
    justify-content: center;
    gap: 32px;
    margin-top: 24px;
}

.b-col {
    display: flex;
    justify-content: center;
}

.b-card {
    width: 100%;
    max-width: 370px;
    min-height: 340px;
    border-radius: 16px;
    box-shadow: 0 4px 18px rgba(93, 112, 145, 0.13);
    border: none;
    transition: transform 0.18s, box-shadow 0.18s;
    background: #fff;
    margin-bottom: 0;
}
.b-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 8px 32px rgba(93, 112, 145, 0.18);
}

.b-card-title {
    font-family: 'Montserrat', Arial, sans-serif;
    font-weight: 700;
    color: #ea732a;
    font-size: 1.3rem;
    margin-bottom: 8px;
}

.b-card-text {
    font-size: 1.08rem;
    color: #5D7091;
    margin-bottom: 12px;
}

.btn-cta {
    background-color: #ea732a;
    color: #F8F8F8;
    border: none;
    font-family: 'Montserrat', Arial, sans-serif;
    font-weight: 700;
    font-size: 1.08rem;
    border-radius: 8px;
    padding: 10px 28px;
    box-shadow: 0 2px 8px rgba(93, 112, 145, 0.10);
    transition: background 0.2s, box-shadow 0.2s;
}

.btn-cta:hover {
    background-color: #4c5b75;
    color: #fff;
    box-shadow: 0 4px 16px rgba(93, 112, 145, 0.18);
}
</style>
