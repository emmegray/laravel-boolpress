<template>
<div class="d-flex flex-column min-vh-100">
    <HeaderComp/>

        <router-view></router-view>

    <FooterComp class="mt-auto"/>
</div>
</template>

<script>
import HeaderComp from './components/partials/HeaderComp.vue';
import FooterComp from './components/partials/FooterComp.vue';

export default {
    name: "App",
    components: { HeaderComp, FooterComp }
}
</script>

<style lang="scss" scoped>
</style>
