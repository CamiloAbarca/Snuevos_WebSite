<template>
    <div class="container py-5 catalogo-view">
        <br>
        <h2 class="text-center mb-4">Catálogo de Vehículos</h2>

        <b-row class="mb-5 filter-row">

            <b-col cols="12" md="4" class="mb-3">
                <h5 class="filter-heading">Carrocería</h5>
                <b-button-group class="d-flex flex-wrap filter-group-buttons">
                    <b-button @click="setFilter('carroceria', null)"
                        :variant="selectedCarroceria === null ? 'dark' : 'outline-dark'" class="filter-button">
                        Todos
                    </b-button>
                    <b-button v-for="carroceria in availableCarrocerias" :key="carroceria"
                        @click="setFilter('carroceria', carroceria)"
                        :variant="selectedCarroceria === carroceria ? 'dark' : 'outline-dark'" class="filter-button">
                        {{ carroceria }}
                    </b-button>
                </b-button-group>
            </b-col>

            <b-col cols="12" md="4" class="mb-3">
                <h5 class="filter-heading">Año</h5>
                <b-button-group class="d-flex flex-wrap filter-group-buttons">
                    <b-button @click="setFilter('ano', null)" :variant="selectedAno === null ? 'dark' : 'outline-dark'"
                        class="filter-button">
                        Todos
                    </b-button>
                    <b-button v-for="ano in availableAnos" :key="ano" @click="setFilter('ano', ano)"
                        :variant="selectedAno === ano ? 'dark' : 'outline-dark'" class="filter-button">
                        {{ ano }}
                    </b-button>
                </b-button-group>
            </b-col>

            <b-col cols="12" md="4" class="mb-3">
                <h5 class="filter-heading">Combustible</h5>
                <b-button-group class="d-flex flex-wrap filter-group-buttons">
                    <b-button @click="setFilter('combustible', null)"
                        :variant="selectedCombustible === null ? 'dark' : 'outline-dark'" class="filter-button">
                        Todos
                    </b-button>
                    <b-button v-for="combustible in availableCombustibles" :key="combustible"
                        @click="setFilter('combustible', combustible)"
                        :variant="selectedCombustible === combustible ? 'dark' : 'outline-dark'" class="filter-button">
                        {{ combustible }}
                    </b-button>
                </b-button-group>
            </b-col>
        </b-row>
        <div v-if="loading" class="text-center">
            <b-spinner label="Cargando..."></b-spinner>
            <p class="mt-2">Cargando vehículos...</p>
        </div>
        <div v-else-if="error" class="text-center text-danger">
            <p>Ocurrió un error al cargar los vehículos: {{ error }}</p>
        </div>

        <b-row v-else>
            <b-col cols="12" sm="6" lg="4" v-for="auto in filteredAutos" :key="auto.id">
                <b-card :title="auto.nombre" :img-src="auto.imagen" :img-alt="auto.nombre" img-top
                    class="mb-4 shadow-sm">
                    <b-card-text>
                        <strong>Año: </strong> {{ auto.ano }} <br>
                        <strong>Kilometraje: </strong> {{ auto.km.toLocaleString() }} Km <br>
                        <strong>Precio: </strong> {{ auto.precio }}
                    </b-card-text>
                    <b-button variant="primary" class="btn-cta" @click="showAutoModal(auto.id)">
                        Más Información
                    </b-button>
                </b-card>
            </b-col>
            <b-col v-if="!filteredAutos.length" cols="12" class="text-center">
                <p class="h4 text-muted">No se encontraron vehículos que coincidan con los filtros aplicados.</p>
            </b-col>
        </b-row>

        <b-modal id="auto-detail-modal" :title="modalAuto.nombre" size="lg" hide-footer>
            <div v-if="modalLoading" class="text-center">
                <b-spinner label="Cargando detalles..."></b-spinner>
                <p class="mt-2">Cargando detalles del vehículo...</p>
            </div>
            <div v-else-if="modalError" class="text-danger">
                <p>Error al cargar los detalles: {{ modalError }}</p>
            </div>
            <div v-else-if="modalAuto && modalAuto.id">
                <b-row>
                    <b-col md="6" class="mb-3">
                        <b-carousel v-if="modalAuto.imagenes && modalAuto.imagenes.length > 0" id="image-carousel"
                            controls indicators :interval="4000" label-prev="Anterior" label-next="Siguiente"
                            style="width: 100%; height: 350px;">

                            <b-carousel-slide v-for="(img, index) in modalAuto.imagenes" :key="img.id"
                                @click.native="showLightbox(index)"
                                :caption="img.es_principal === 1 ? 'Imagen Principal' : (img.descripcion || '')">
                                <template #img>
                                    <img class="d-block img-fluid w-100 image-clickable" :src="img.url_imagen"
                                        :alt="modalAuto.nombre" style="object-fit: cover; height: 350px;">
                                </template>
                            </b-carousel-slide>
                        </b-carousel>
                        <img v-else :src="FALLBACK_IMAGE_URL" :alt="'Imagen no disponible para ' + modalAuto.nombre"
                            class="img-fluid rounded">
                    </b-col>
                    <b-col md="6">
                        <h4>Detalles Técnicos</h4>
                        <ul class="list-unstyled">
                            <li><strong>Marca:</strong> {{ modalAuto.marca }}</li>
                            <li><strong>Modelo:</strong> {{ modalAuto.modelo }}</li>
                            <li><strong>Año:</strong> {{ modalAuto.ano }}</li>
                            <li><strong>Kilometraje:</strong> {{ modalAuto.km ? modalAuto.km.toLocaleString() + ' Km' :
                                'N/A' }}</li>
                            <li><strong>Combustible:</strong> {{ modalAuto.combustible }}</li>
                            <li><strong>Transmisión:</strong> {{ modalAuto.transmision }}</li>
                            <li><strong>Carrocería:</strong> {{ modalAuto.carroceria }}</li>
                        </ul>
                        <h4 class="mt-4">Descripción</h4>
                        <p>{{ modalAuto.descripcion || 'Sin descripción disponible.' }}</p>
                    </b-col>
                </b-row>
            </div>
        </b-modal>

        <b-modal id="lightbox-modal" :title="'Imágenes de ' + modalAuto.nombre" size="xl" centered
            v-model="lightboxShow" hide-footer header-bg-variant="dark" header-text-variant="light"
            content-class="lightbox-modal-content">

            <div class="full-screen-carousel-container">
                <b-carousel v-if="modalAuto.imagenes && modalAuto.imagenes.length > 0" id="full-screen-carousel"
                    controls indicators :interval="0" v-model="lightboxIndex" label-prev="Anterior"
                    label-next="Siguiente" style="width: 100%; height: 100%;">

                    <b-carousel-slide v-for="(img) in modalAuto.imagenes" :key="img.id" :img-src="img.url_imagen"
                        :caption="img.es_principal === 1 ? 'Imagen Principal' : (img.descripcion || '')"
                        img-height="100%" img-width="100%">
                    </b-carousel-slide>
                </b-carousel>
            </div>
        </b-modal>
    </div>
</template>

<script>
import axios from 'axios';

const DOMAIN = 'https://snuevos.cl';
const API_BASE_URL = `${DOMAIN}/api`;
const FALLBACK_IMAGE_URL = 'https://via.placeholder.com/400x300?text=Imagen+No+Disponible';

export default {
    name: "CatalogoView",
    data() {
        return {
            allAutos: [],
            loading: true,
            error: null,
            // Datos de Filtros
            availableCarrocerias: [],
            selectedCarroceria: null,
            availableAnos: [], // Nuevo: Lista de años disponibles
            selectedAno: null, // Nuevo: Año seleccionado
            availableCombustibles: [], // Nuevo: Lista de combustibles disponibles
            selectedCombustible: null, // Nuevo: Combustible seleccionado
            // Datos para el modal
            modalAuto: {},
            modalLoading: false,
            modalError: null,
            // Datos para Lightbox
            lightboxShow: false,
            lightboxIndex: 0,
        };
    },
    computed: {
        filteredAutos() {
            let filtered = this.allAutos;

            // 1. Filtrar por Carrocería
            if (this.selectedCarroceria) {
                filtered = filtered.filter(auto =>
                    auto.carroceria && auto.carroceria.toLowerCase() === this.selectedCarroceria.toLowerCase()
                );
            }

            // 2. Filtrar por Año
            if (this.selectedAno) {
                // Se convierte a número para una comparación precisa (asumiendo que ano es numérico)
                filtered = filtered.filter(auto =>
                    auto.ano && Number(auto.ano) === Number(this.selectedAno)
                );
            }

            // 3. Filtrar por Combustible
            if (this.selectedCombustible) {
                filtered = filtered.filter(auto =>
                    auto.combustible && auto.combustible.toLowerCase() === this.selectedCombustible.toLowerCase()
                );
            }

            return filtered;
        }
    },
    mounted() {
        this.fetchAutos();
    },
    methods: {
        makeAbsoluteUrl(url) {
            if (!url) return FALLBACK_IMAGE_URL;
            if (url.startsWith('http') || url.startsWith('//')) {
                return url;
            }
            return `${DOMAIN}${url.startsWith('/') ? '' : '/'}${url}`;
        },

        // Método unificado para manejar todos los filtros
        setFilter(type, value) {
            // Lógica para deseleccionar el mismo filtro
            if (type === 'carroceria') {
                this.selectedCarroceria = this.selectedCarroceria === value ? null : value;
            } else if (type === 'ano') {
                this.selectedAno = this.selectedAno === value ? null : value;
            } else if (type === 'combustible') {
                this.selectedCombustible = this.selectedCombustible === value ? null : value;
            }
        },

        async fetchAutos() {
            try {
                this.loading = true;
                this.error = null;

                const autosResponse = await axios.get(`${API_BASE_URL}/automoviles`);
                let autosData = autosResponse.data;

                const carroceriasSet = new Set();
                const anosSet = new Set();
                const combustiblesSet = new Set();

                const fetchImagesPromises = autosData.map(async (car) => {

                    // Llenar los sets de filtros
                    if (car.carroceria) {
                        carroceriasSet.add(car.carroceria);
                    }
                    if (car.ano) {
                        anosSet.add(car.ano);
                    }
                    if (car.combustible) {
                        combustiblesSet.add(car.combustible);
                    }

                    let rawImageUrl = null;
                    let allImagenes = [];
                    try {
                        const imagenResponse = await axios.get(`${API_BASE_URL}/imagenes?automovil_id=${car.id}`);
                        allImagenes = imagenResponse.data;

                        // La imagen principal es el primer elemento de la lista
                        const mainImage = allImagenes[0];
                        rawImageUrl = mainImage ? mainImage.url_imagen : null;

                    } catch (e) {
                        console.warn(`No se pudo cargar la imagen para el auto ID ${car.id}.`, e);
                    }

                    return {
                        id: car.id,
                        nombre: `${car.marca} ${car.modelo}`,
                        marca: car.marca,
                        modelo: car.modelo,
                        ano: car.ano,
                        km: car.km,
                        combustible: car.combustible,
                        transmision: car.transmision,
                        carroceria: car.carroceria,
                        descripcion: car.descripcion,
                        imagenes: allImagenes.map(img => ({
                            ...img,
                            url_imagen: this.makeAbsoluteUrl(img.url_imagen)
                        })),
                        imagen: this.makeAbsoluteUrl(rawImageUrl),
                    };
                });

                this.allAutos = await Promise.all(fetchImagesPromises);

                // Asignar y ordenar los filtros
                this.availableCarrocerias = Array.from(carroceriasSet).sort();
                this.availableCombustibles = Array.from(combustiblesSet).sort();
                // Ordenar años de forma descendente (más nuevos primero)
                this.availableAnos = Array.from(anosSet).sort((a, b) => b - a);

            } catch (err) {
                console.error("Error al obtener los vehículos:", err);
                this.error = 'No se pudo cargar el catálogo. Por favor, verifica el estado de la API.';
            } finally {
                this.loading = false;
            }
        },

        showAutoModal(id) {
            const autoData = this.allAutos.find(auto => auto.id === id);

            if (autoData) {
                this.modalAuto = autoData;
                this.modalError = null;
                this.modalLoading = false;
            } else {
                this.modalError = 'Detalles del vehículo no encontrados en el catálogo cargado.';
                this.modalAuto = {};
            }

            this.$bvModal.show('auto-detail-modal');
        },

        showLightbox(index) {
            this.lightboxIndex = index;
            this.lightboxShow = true;
        }
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');

/* Estilos de Contenedor General */
.catalogo-view {
    padding-top: 80px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    background: linear-gradient(120deg, #f8f8f8 60%, #e3eafc 100%);
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(93, 112, 145, 0.10);
    font-family: 'Montserrat', Arial, sans-serif;
    padding: 48px 32px;
}

/* Estilos para Título */
.text-center {
    font-family: 'Montserrat', Arial, sans-serif;
    font-weight: 700;
    font-size: 2.3rem;
    color: #030915;
    letter-spacing: 1px;
    margin-bottom: 32px;
}

/* Estilos para el Filtro */
.filter-heading {
    font-size: 1.1rem;
    font-weight: 700;
    color: #030915;
    margin-bottom: 8px;
}

.filter-group-buttons {
    gap: 5px;
}

.filter-button {
    font-size: 0.85rem;
    font-weight: 600;
    padding: 8px 12px;
    border-radius: 20px;
    border-width: 1px;
    margin: 2px 0;
    /* Pequeño margen para separación en flex-wrap */
}

/* Estilos de la Tarjeta */
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
    color: #5b6474;
    font-size: 1.3rem;
    margin-bottom: 8px;
}

.b-card-text {
    font-size: 1.08rem;
    color: #5D7091;
    margin-bottom: 12px;
}

/* ESTILO DEL BOTÓN CTA (MÁS INFORMACIÓN) */
.btn-cta {
    background-color: #030915;
    color: #F8F8F8;
    border: none;
    font-family: 'Montserrat', Arial, sans-serif;
    font-weight: 700;
    font-size: 1.08rem;
    border-radius: 8px;
    padding: 10px 28px;
    box-shadow: 0 2px 8px rgba(3, 9, 21, 0.2);
    transition: background 0.2s, box-shadow 0.2s;
}

.btn-cta:hover {
    background-color: #1a2332;
    color: #fff;
    box-shadow: 0 4px 16px rgba(3, 9, 21, 0.3);
}

/* Estilos de Carrusel y Modal */
.carousel-inner,
.carousel-item {
    height: 100%;
    border-radius: 8px;
}

.image-clickable {
    cursor: pointer;
}

.b-carousel-slide img {
    height: 100%;
    object-fit: cover;
}

.lightbox-modal-content {
    background-color: #1a1a1a !important;
}

.full-screen-carousel-container {
    height: 80vh;
}

#full-screen-carousel .carousel-inner img {
    height: 100%;
    width: auto;
    object-fit: contain;
    max-width: 100%;
}

.list-unstyled li {
    padding-left: 0;
    margin-bottom: 5px;
    color: #343a40;
}
</style>