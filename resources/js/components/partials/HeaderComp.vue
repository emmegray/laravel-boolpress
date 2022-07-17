<template>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item nav-link">
                    <router-link :to="{name: 'home'}">Home</router-link>
                </li>
                <li class="nav-item nav-link">
                    <router-link :to="{name: 'blog'}">Blog</router-link>
                </li>
                <li class="nav-item nav-link">
                    <router-link :to="{name: 'about'}">About</router-link>
                </li>
                <li class="nav-item nav-link">
                    <router-link :to="{name: 'contacts'}">Contacts</router-link>
                </li>
            </ul>
        </header>
    </div>



</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
</style>
