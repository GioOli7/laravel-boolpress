<template>
    <div>
        <Header />

        <main>
            <!-- component matched by route will render here -->
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import axios from "axios";
import Header from "./components/Header.vue";

export default {
    name: "App",
    components: {
        Header
    }
};
</script>

<style lang="scss">
@import "../sass/frontoffice/utilities";
body {
    font-family: san-serif;
}

.navigation {
    .active-page {
        background-color: lightblue;
    }
}
</style>
