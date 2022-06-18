<template>
<div class="listPackages">
<h1> Balíčky: Název složky  </h1>
   
   <create-package-modal v-if="createPackageModalShow" :folder_id="folder" v-on:refreshPackage="reloadPackage()" v-on:closeModalCreatePackage="closeModalCrFolders()" :user="users"/>
   <div class="listPackages__buttons">
          <button @click="createPackageModalShow = true" class="listPackages__buttons--button"> Vytvořit nový balíček </button>
        <router-link :to="'/packages'">  <button class="listPackages__buttons--button"> Otevřít</button></router-link>
    </div>

<div class="listPackages__wrap">
    <div class="listPackages__single" v-for="item in packages" :key="item.id">
        <span class="listPackages__single--emoji"> {{emoji.emoji}} </span>
       
        <div class="listPackages__single--information">
            <h2>  {{item.name}} </h2>

            <div class="listPackages__single--play"> 
            <router-link :to="'/package/' + item.id"> <i class="fas fa-play"></i> </router-link>
            </div>
        </div>

        <div class="listPackages__edits">
            <router-link :to="'/package/' + item.id + '/edit/'">  <i class="fas fa-pen"></i></router-link>
            <a  @click.prevent="deleteSend(item.id)">  <i class="fas fa-trash-alt"></i></a>
        </div>
    </div>

<delete-modal 
    title="Opravdu si přejete odstranit Váš balíček i se všemi jeho otázkami?"
    v-if="showDeleteFolder"
    v-on:deleteFolder="deletePackage()"
    v-on:closeDeleteFolder="showDeleteFolder = false"
/>
    
    </div>
</div>
</template>

<script>
import CreatePackageModal from '../modals/CreatePackageModal'
import DeleteModal from '../modals/DeleteModal'



    export default {
    
    name: "ListPacakges",
    
    data() {
        return {
            createPackageModalShow: false,
            showDeleteFolder: false,
            deleteid: null,

        }
    },

    created() {
            axios.get('./api/users', ).then(response => {

            this.users = response.data

            });

            console.log(this.folder);
    },

    components:{
        CreatePackageModal,
        DeleteModal,
    },

    methods: {
        closeModalCrFolders(){
            this.createPackageModalShow = false; 
        },
        reloadPackage(){
            this.$emit('refreshPackage')
        },
        deleteSend(id){
            this.showDeleteFolder = true;
            this.deleteid = id;
        },
         deletePackage(){
                // ODSTRANENÍ BALÍČKU V PODSLOŽCE
                 axios.delete('./api/packages/' + this.deleteid).then(response => {
                    this.reloadPackage();
                    this.showDeleteFolder = false;
                   });;
            },
    },

    props:['packages', 'folder', 'emoji']
        
           
}
      

</script>

<style lang="scss" scoped>

</style>