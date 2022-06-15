<template>
<div class="listPackages">
<h1> Balíčky: Název složky  </h1>
   
   <div class="listPackages__buttons">
          <button class="listPackages__buttons--button"> Vytvořit nový balíček </button>
        <router-link :to="'/packages'">  <button class="listPackages__buttons--button"> Otevřít</button></router-link>
    </div>

<div class="listPackages__wrap">

    <div class="listPackages__single" v-for="item in packages" :key="item.id">
        <span class="listPackages__single--emoji"> 🇬🇧 </span>
       
        <div class="listPackages__single--information">
            <h2>  {{item.name}} </h2>
            <p> 12 Otázek</p>

            <div class="listPackages__single--play"> 
            <router-link :to="'/package/'"> <i class="fas fa-play"></i> </router-link>
            </div>
        </div>

        <div class="listPackages__edits">
            <router-link :to="'/package/'">  <i class="fas fa-pen"></i></router-link>
            <a  @click.prevent="">  <i class="fas fa-trash-alt"></i></a>
        </div>
    </div>

    
    </div>
</div>
</template>

<script>
    export default {
    
    name: "ListPacakges",
    
    data() {
            return {
                packages: [],

            }
    },

        methods: {
           
            },

    props:['packages']
        
           
}
      

</script>

<style lang="scss" scoped>

</style>