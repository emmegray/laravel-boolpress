<template>
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li>
                <router-link :to="{name: 'home'}">Home</router-link>
            </li>
            <li>
                <router-link :to="{name: 'blog'}">Blog</router-link>
            </li>
            <li>
                <router-link :to="{name: 'about'}">About</router-link>
            </li>
            <li>
                <router-link :to="{name: 'contacts'}">Contacts</router-link>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
</style>
