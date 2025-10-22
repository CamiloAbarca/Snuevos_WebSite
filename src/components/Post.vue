<template>
    <div>
        <br><br>

        <!-- Iframe de Mirror App (único y adaptable) -->
        <iframe ref="mirrorIframe" onload="iFrameSetup(this)"
            src="https://app.mirror-app.com/feed-instagram/08f8b769-0b57-4517-b86f-e7843d8db972/preview"
            style="border:none;overflow:hidden;" scrolling="no">
        </iframe>
    </div>
</template>

<script>
export default {
    name: "PostView",
    mounted() {
        // Cargar el script de Mirror App si aún no está agregado
        if (!document.querySelector('script[src="https://cdn.jsdelivr.net/npm/@mirrorapp/iframe-bridge@latest/dist/index.umd.js"]')) {
            const script = document.createElement("script");
            script.src = "https://cdn.jsdelivr.net/npm/@mirrorapp/iframe-bridge@latest/dist/index.umd.js";
            script.async = true;
            document.body.appendChild(script);
        }

        // Definir la función global que el iframe usa
        window.iFrameSetup = (iframe) => {
            if (window.MirrorAppIframeBridge) {
                window.MirrorAppIframeBridge.setupIframe(iframe);
            }
        };
    },
};
</script>

<style lang="scss" scoped>
iframe {
    display: block;
    margin: 0 auto;
    width: 60%;
    min-height: 500px;
    transition: width 0.3s ease;
}

/* Tablets */
@media (max-width: 900px) {
    iframe {
        width: 80%;
    }
}

/* Celulares */
@media (max-width: 600px) {
    iframe {
        width: 100%;
        min-height: 800px;
    }
}
</style>
