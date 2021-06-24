<template>
    <div>
        <Header />

        <main>
            <div class="container">
                <h1>Blog</h1>

                <article v-for="post in posts" :key="post.id">
                    <h2>{{ post.title }}</h2>
                    <div>{{ post.created_at }}</div>
                    <a href="">more</a>
                </article>
            </div>
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
    },
    data() {
        return {
            posts: []
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios
                .get("http://127.0.0.1:8000/api/posts")
                .then(res => {
                    console.log(res.data);
                    this.posts = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style lang="scss">
@import "../sass/frontoffice/utilities";
body {
    font-family: san-serif;
}
</style>
