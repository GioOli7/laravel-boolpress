<template>
    <div>
        <Title :post="post" />
        <Category v-if="post.category" :post="post" />
        <Tag :post="post" />
        <Content :post="post" />
    </div>
</template>

<script>
import Title from "../components/Title.vue";
import Category from "../components/Category.vue";
import Tag from "../components/Tag.vue";
import Content from "../components/Content.vue";
export default {
    name: "Post",
    components: {
        Title,
        Category,
        Tag,
        Content
    },
    props: ["post"]
};
</script>

<style></style>
