<template>
    <div>
        <div class="main-grid">
        <Menu />
        <div class="app-content">
            <router-view/>
        </div>
        </div>
    </div>
</template>

<script>
import MainApp from './components/MainApp'
import Menu from './Menu.vue'
    export default {
        components:{
            MainApp, Menu
        },
        data() {
            return {
                refresh: true,
            }
        },

        methods:{
            refFalse(){
                this.refresh = false;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
