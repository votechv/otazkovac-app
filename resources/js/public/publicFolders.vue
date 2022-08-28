<template>
    <div>
<public-hero />
<div class="public-folders">
  <div class="mainFolders__grid">
        <div class="mainFolders__single" @click="$router.push('/public/' + folder.slug)"  v-for="folder in folders" :key="folder.id">
       <div class="mainFolders__pseudo" > </div>
        <div class=" mainFolders__single--emoji">      
          <p>{{folder.emoji}}</p>
        </div>
           <div class="mainFolders__single--content">    
               <h2> {{folder.name}}</h2> 
            </div>
        </div>
         </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import publicHero from './publicHero.vue'

    export default {
    
    name: "PublicFolders",
    
    data() {
      return {
        folders: '',
      }
    },

    components:{
      publicHero
    },

      mounted() {
      this.getFolders();
  
    },
    methods:{


      async getFolders(){
            axios.get('/api/foldersoffline/').then(response => {
                this.folders = response.data
            })
               .catch(error => {
                 window.location.href = "/404";
            });
       },



          },
        
           
};
</script>

<style lang="scss" scoped>

</style>