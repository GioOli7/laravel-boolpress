<template>
    <header>
        <router-link :to="{ name: 'home' }">Boolpress Home</router-link>

        <nav>
            <ul>
                <!-- <li><a href="">Blog</a></li>
                <li><a href="">About</a></li> -->
                <li>
                    <router-link :to="{ name: 'blog' }">Blog</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'about' }">About</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header"
};
</script>

<style lang="scss" scoped>
header {
    background-color: lightblue;
}
</style>
