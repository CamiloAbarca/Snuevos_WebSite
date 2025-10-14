<template>
    <div id="contacto" class="contact-container">
        <header class="contact-header text-center py-5">
            <h1 class="display-4 font-weight-bold mb-1">Contáctanos</h1>
        </header>

        <b-container class="my-5">
            <b-row class="justify-content-center">
                <b-col md="5" class="contact-info p-4 mb-4 mb-md-0 text-center">
                    <h2 class="mb-4">Información de Contacto</h2>
                    <p><b-icon icon="envelope-fill" class="mr-2"></b-icon> <strong>Email:</strong> contacto@snuevos.cl
                    </p>
                    <p><b-icon icon="envelope-fill" class="mr-2"></b-icon> <strong>Email:</strong> mmoya@snuevos.cl
                    </p>
                    <p><b-icon icon="telephone-fill" class="mr-2"></b-icon> <strong>Teléfono:</strong> +56 9 91588787
                    </p>
                    <p><b-icon icon="whatsapp" class="mr-2"></b-icon> <strong>WhatsApp:</strong> +56 9 91588787
                    </p>

                    <hr class="my-4">

                    <div class="social-icons">
                        <h2 class="mb-3">Síguenos</h2>
                        <a href="https://www.instagram.com/snuevos2025/" class="social-icon-link mx-2"
                            aria-label="Instagram"><b-icon icon="instagram"></b-icon></a>
                        <a href="https://wa.me/56991588787" class="social-icon-link mx-2" aria-label="WhatsApp"><b-icon
                                icon="whatsapp"></b-icon></a>
                    </div>
                </b-col>

                <b-col md="7" class="contact-form p-4">
                    <b-form @submit.prevent="submitForm">
                        <b-row>
                            <b-col md="6">
                                <b-form-group label="Nombre*" label-for="nombre">
                                    <b-form-input id="nombre" v-model="form.nombre" required></b-form-input>
                                </b-form-group>
                            </b-col>
                            <b-col md="6">
                                <b-form-group label="Apellido*" label-for="apellido">
                                    <b-form-input id="apellido" v-model="form.apellido" required></b-form-input>
                                </b-form-group>
                            </b-col>
                        </b-row>

                        <b-row>
                            <b-col md="6">
                                <b-form-group label="Fono*" label-for="fono">
                                    <b-form-input id="fono" v-model="form.fono" required></b-form-input>
                                </b-form-group>
                            </b-col>
                            <b-col md="6">
                                <b-form-group label="Correo Electrónico*" label-for="email">
                                    <b-form-input id="email" v-model="form.email" type="email" required></b-form-input>
                                </b-form-group>
                            </b-col>
                        </b-row>

                        <b-form-group label="Mensaje*" label-for="mensaje">
                            <b-form-textarea id="mensaje" v-model="form.mensaje" rows="4" required></b-form-textarea>
                        </b-form-group>

                        <b-button type="submit" class="w-100 mt-3" style="background-color: #60697a;;">
                            Enviar Mensaje
                        </b-button>
                    </b-form>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ContactoComponent',
    data() {
        return {
            form: {
                nombre: '',
                apellido: '',
                email: '',
                fono: '',
                mensaje: ''
            }
        };
    },
    methods: {
        async submitForm() {
            try {
                // Envía los datos del formulario al script de PHP
                const response = await axios.post('https://snuevos.cl/enviar-correo.php', this.form);

                if (response.data.success) {
                    alert('¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente.');
                    // Reiniciar el formulario
                    this.form = {
                        nombre: '',
                        apellido: '',
                        email: '',
                        fono: '',
                        mensaje: ''
                    };
                } else {
                    alert('Hubo un error al enviar el mensaje. Inténtalo de nuevo más tarde.');
                }
            } catch (error) {
                console.error('Error al enviar el formulario:', error);
                alert('Hubo un error al enviar el mensaje. Por favor, verifica tu conexión e inténtalo de nuevo.');
            }
        }
    }
};
</script>

<style scoped>
.contact-container {
    background-color: #ffffff;
    min-height: 100vh;
}

.contact-header {
    color: #030915;
}

.contact-info {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-form {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.social-icons .b-icon {
    font-size: 2.5rem;
    color: #60697a ;
    transition: color 0.3s;
}

.social-icons .b-icon:hover {
    color: #858793;
    /* Color de hover para los íconos */
}
</style>