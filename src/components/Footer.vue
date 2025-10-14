<template>
    <footer class="footer">
        <p>
            © 2025 Snuevos. Todos los derechos reservados. Desarrollado por
            <a href="https://cabarcadev.com/">CabarcaDev.com</a>
        </p>
    </footer>
</template>

<script>
export default {
    name: "FooterView",
};
</script>

<style scoped>
.footer {
    background-color: #0A1C34;
    color: #C0C0C0;
    text-align: center;
    padding: 20px;
}

/* Estilos del enlace */
.footer a {
    color: #838da1;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: none;
    /* Opcional: asegura que tampoco aparezca al pasar el cursor */
}
</style>
