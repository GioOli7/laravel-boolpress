<template>
    <div>
        <Header />

        <main>
            <div class="container">
                <h1>Blog</h1>

                <article v-for="post in posts" :key="post.id">
                    <h2>{{ post.title }}</h2>
                    <div>{{ formatDate(post.created_at) }}</div>
                    <a href="">more</a>
                </article>

                <section class="navigation">
                    <!-- prev -->
                    <button
                        @click="getPosts(pagination.current - 1)"
                        v-show="pagination.current > 1"
                    >
                        Prev
                    </button>

                    <!-- navigation -->
                    <button
                        v-for="i in pagination.last"
                        :key="`page-${i}`"
                        @click="getPosts(i)"
                        :class="{ 'active-page': i == pagination.current }"
                    >
                        {{ i }}
                    </button>

                    <!-- next -->
                    <button
                        @click="getPosts(pagination.current + 1)"
                        v-show="pagination.current < pagination.last"
                    >
                        Next
                    </button>
                </section>
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
            posts: [],
            pagination: {}
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            axios
                .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(res => {
                    console.log(res.data);
                    this.posts = res.data.data;
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    };
                })
                .catch(err => {
                    console.log(err);
                });
        },
        formatDate(date) {
            const postDate = new Date(date);
            let day = postDate.getDate();
            let month = postDate.getMonth() + 1;
            const year = postDate.getFullYear();

            if (day < 10) {
                day = "0" + day;
            }

            if (month < 10) {
                month = "0" + month;
            }

            return `${day}/${month}/${year}`;
        }
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
