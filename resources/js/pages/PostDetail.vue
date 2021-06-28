<template>
    <div class="container">
        <Post v-if="post" :post="post" />
        <Loading v-else />
    </div>
</template>

<script>
import axios from "axios";
import Post from "../components/Post.vue";
import Loading from "../components/Loading.vue";

export default {
    name: "PostDetail",
    components: {
        Post,
        Loading
    },
    data() {
        return {
            post: null
        };
    },
    created() {
        this.getPostDetails();
    },
    methods: {
        getPostDetails() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`
                )
                .then(res => {
                    console.log(res.data);
                    this.post = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style lang="scss" scoped></style>
