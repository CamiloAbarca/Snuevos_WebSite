<template>
    <div>
        <Hero />
        <!--<Tipos />-->
        <Post />
        <Vehiculos />
        <Contacto />
    </div>
</template>

<script>
import Hero from "../components/Hero.vue";
import Vehiculos from "../components/Vehiculos.vue";
import Contacto from "../components/Contacto.vue";
import Post from "../components/Post.vue";
//import Tipos from "../components/Tipos.vue";

export default {
    name: "HomeView",
    components: {
        Hero,
        //Tipos,
        Post,
        Vehiculos,
        Contacto,
    },
};
</script>
