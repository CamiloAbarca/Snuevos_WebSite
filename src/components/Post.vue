<template>
    <div>
        <br><br>
        <iframe ref="mirrorIframe" onload="iFrameSetup(this)"
            src="https://app.mirror-app.com/feed-instagram/b6180e36-c189-4e02-b305-d4866e04a5db/preview"
            style="width:50%;border:none;overflow:hidden;" scrolling="no"></iframe>
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
    min-height: 500px;
    transition: width 0.3s;
}

@media (max-width: 900px) {
    iframe {
        width: 70%;
    }
}

@media (max-width: 600px) {
    iframe {
        width: 100%;
    }
}
</style>
