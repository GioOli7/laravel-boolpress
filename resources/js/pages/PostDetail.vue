<template>
    <div class="container">
        <div v-if="post">
            <Title :post="post" />
            <Category v-if="post.category" :post="post" />
            <Tag :post="post" />
            <Content :post="post" />
        </div>

        <Loading v-else />
    </div>
</template>

<script>
import axios from "axios";
import Title from "../components/Title.vue";
import Category from "../components/Category.vue";
import Tag from "../components/Tag.vue";
import Content from "../components/Content.vue";
import Loading from "../components/Loading.vue";

export default {
    name: "PostDetail",
    components: {
        Title,
        Category,
        Tag,
        Content,
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
