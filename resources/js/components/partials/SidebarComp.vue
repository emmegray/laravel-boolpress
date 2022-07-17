<template>
<div>
    <h3>Category:</h3>
    <ul class="list-group">
        <li
        v-for="category in categories"
        :key="`cat${category.id}`"
        @click="$emit('searchPostsByCategory', category.slug)"
        class="list-group-item"
        >
        {{category.name}}
        </li>
    </ul>
    <h3>Tag:</h3>
    <ul class="list-group">
        <li
        v-for="tag in tags"
        :key="`tag${tag.id}`"
        @click="$emit('searchPostsByTag', tag.slug)"
        class="list-group-item">
        {{tag.name}}
        </li>
    </ul>
</div>
</template>

<script>
export default {
name: 'SidebarComp',
props:{
    categories: Array,
    tags: Array,
}
}
</script>

<style lang="scss" scoped>
 ul{
        list-style: none;
        li{
            cursor: pointer;
        }
    }
</style>
