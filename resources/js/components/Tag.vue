<template>
    <div>
        <span class="tag" v-for="tag in post.tag" :key="`tag-${tag.id}`">{{
            tag.name
        }}</span>
    </div>
</template>

<script>
export default {
    name: "Tag",
    props: ["post"]
};
</script>

<style lang="scss" scoped>
.tag {
    display: inline-block;
    margin-right: 10px;
    padding: 3px;
    border-radius: 10px;
    background-color: dodgerblue;
    color: white;
}
</style>
