<template>
    <div class="container">
        <div v-if="post">
            <h2>{{ post.title }}</h2>
            <div class="category">
                Category: <strong> {{ post.category.name }} </strong>
            </div>

            <div>
                <span
                    class="tag"
                    v-for="tag in post.tag"
                    :key="`tag-${tag.id}`"
                    >{{ tag.name }}</span
                >
            </div>

            <p>{{ post.content }}</p>
        </div>
        <div v-else>
            loading...
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "PostDetail",
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

<style lang="scss" scoped>
.category {
    margin-bottom: 10px;
}

.tag {
    margin-right: 10px;
    padding: 3px;
    border-radius: 10px;
    background-color: dodgerblue;
    color: white;
}
</style>
