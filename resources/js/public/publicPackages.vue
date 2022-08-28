<template>
    <div>
    <public-hero />
        <template v-if="loadingbar"> 
        <div class="loadingdesign loadingclass"> </div>
         </template>

         <template v-else> 
         <div class="public-folders">
       <h5> {{packages.name}}</h5>
      <div class="listPackages__wrap">
            <div class="listPackages__single" v-for="item in packages.package" :key="item.id">
                <span class="listPackages__single--emoji"> {{packages.emoji}}</span>
            
                <div class="listPackages__single--information">
                    <h2>  {{item.name}} </h2>

                    <div class="listPackages__single--play" @click="$router.push('/public/' + packages.slug + '/' + item.slug )"> 
                       <i class="fa-solid fa-play"></i> 
                    </div>
                </div>
            </div>
        </div>
        </div>
        </template>
    </div>
</template>

<script>
import publicHero from './publicHero.vue'
    export default {

        data() {
            return {
                packages: [],
                folders: [],
                loadingbar: true,
                folderid: null
            }
        },

        components:{
            publicHero
        },

        created(){
            this.getFolder();
        },
      
    methods: {
       async getFolder(){
               axios.get('/api/foldersoffline/').then(response => {
                   this.folders = response.data;
                   this.folders.forEach(folder => {
                       if(folder.slug == this.$route.params.slug){
                            this.folderid = folder.id
                       }
                   });

                   if(this.folderid != null){
                       this.getPackage();
                   }else{
                       window.location.href = "/404";
                   }


            })
               .catch(error => {
                window.location.href = "/404";
            });
       },

       async getPackage(){
                await axios.get('/api/foldersoffline/' + this.folderid).then(response => {
                this.packages = response.data;
                   this.loadingbar = false;
           
            })
               .catch(error => {
                window.location.href = "/404";
            });
       },
 
 
      },
    }
</script>

<style lang="scss" scoped>
.listPackages__single::after {
top: 0px !important;
}
</style>