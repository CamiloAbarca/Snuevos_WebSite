<template>
    <b-navbar toggleable="lg" type="dark" class="navbar fixed-top">
        <b-navbar-brand to="/" tag="router-link">
            <img src="@/assets/logosn.png" alt="Logo Snuevos" height="30" />
        </b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav class="ml-auto">
                <template v-if="$route.path === '/catalogo' || $route.path === '/nosotros'">
                    <b-nav-item to="/" tag="router-link">Volver</b-nav-item>
                </template>
                <template v-else>
                    <b-nav-item href="#inicio" tag="a">Inicio</b-nav-item>
                    <b-nav-item href="#vehiculos" tag="a">Vehículos</b-nav-item>
                    <b-nav-item to="/nosotros" tag="router-link">Nosotros</b-nav-item>
                    <b-nav-item href="#contacto" tag="a">Contacto</b-nav-item>
                </template>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>

<script>
export default {
    name: "NavbarView",
};

</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');
    .navbar {
        background-color: #030915;
    }

    .navbar-nav .nav-link {
        color: #60697a !important;
        transition: color 0.2s;
        font-family: 'Montserrat', Arial, sans-serif;
        font-weight: 600;
    }

    .navbar-nav .nav-link:hover {
        color: #fff !important;
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
</style>