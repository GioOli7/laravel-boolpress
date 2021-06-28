<template>
    <div class="category">
        Category: <strong> {{ post.category.name }} </strong>
    </div>
</template>

<script>
export default {
    name: "Category",
    props: ["post"]
};
</script>

<style lang="scss" scoped>
.category {
    margin-bottom: 10px;
}
</style>
