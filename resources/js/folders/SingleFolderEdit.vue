<template>
    <div>
          <div class="headtop__info">
        <div class="headtop__info--head">   
             <h2> {{folders.emoji}} {{folders.name}}</h2>
        </div>
        <div class="headtop__info--buttons">
            <button class="headtop--mainButton" @click="createPackageModalOpen()"> <i class="fa-solid fa-plus"></i> Přidat balíček </button> 
            <button  class="headtop--mainButton" @click="editFolderModalOpen()"><i class="fa-solid fa-marker"></i>Upravit složku</button>
            <button  class="headtop--mainButton headtop--delete" @click="deleteFolderModalOpen()"><i class="fa-solid fa-trash"></i>Smazat složku</button>
        </div>
    </div>


    <div class="listPackages__wrap">
    <div class="listPackages__single listPackages__single-hover" @click="createPackageModalOpen()">
       
        <div class="listPackages__single--information">
            <h2> <i style="color: #24695c" class="fa-solid fa-circle-plus"></i> </h2>
          
        </div>

    </div>
    <div class="listPackages__single" v-for="item in packages" :key="item.id">
       
        <div class="listPackages__single--information">
            <h2>  {{item.name}} </h2>

           <div class="listPackages__single--play"> 
            <router-link :to="'/package/' + item.id + '/edit/'">  <i class="fas fa-pen" style="font-size: 40px;"></i></router-link>
            </div>

        <div class="listPackages__edits">
            <a  @click.prevent="deletePackageModalOpen(item.id)">  <i class="fas fa-trash-alt"></i></a>
        </div>
        </div>

     
    </div>
    </div>

    
 <create-package-modal v-if="createPackageModalShow" :folderid="folders.id" v-on:refreshPackage="packageCreated" v-on:closeModalCreatePackage="createPackageModalClose()" :user="user"/>
   <delete-modal 
    title="Opravdu si přejete odstranit Váš balíček i se všemi jeho otázkami?"
    v-if="showDeletePackageModal"
    v-on:deleteFolder="deletePackage()"
    v-on:closeDeleteFolder=" deletePackageModalClose()"
/>

     <delete-modal 
         title="Opravdu si přejete odstranit celou složku?  Nenávratně budou odstraněny všechny balíčky i otázky v této složce!"
         v-if="showDeleteFolderModal"
         v-on:deleteFolder="deleteFolder()"
         v-on:closeDeleteFolder="deleteFolderModalClose"
         />

<edit-folder v-if="eidtFolderModalShow" :folder="folders" v-on:closemodal="editFolderModalClose" v-on:reloadFolder="getFolders"/>

    </div>
</template>

<script>
import ListPackages from '../packages/ListPackages'
import CreatePackageModal from '../modals/CreatePackageModal'
import DeleteModal from '../modals/DeleteModal'
import EditFolder from '../modals/EditFolder'

    export default {
        data() {
            return {
                folders: '',
                user: '',
                packages: '',
                emoji: '',
                createPackageModalShow: false,
                showDeletePackageModal: false,
                deleteId: null,
                eidtFolderId: null,
                eidtFolderModalShow: false,
                showDeleteFolderModal: false,
            }
        },
        components:{
            ListPackages, CreatePackageModal, DeleteModal, EditFolder
        },
        mounted() {
            this.getFolders();
            this.getUser();
        },

        methods: {
              getFolders(){
                axios.get('/api/folders/'+this.$route.params.id).then(response => {
                    this.folders = response.data;
                    this.packages = response.data.package;
                   
                    
                    console.log(this.folders);
                    })
                    .catch(error => {
                        //return this.$router.push('../404')
                    });
            },

            getUser(){
                axios.get('/api/users', ).then(response => {

                    this.user = response.data

                    console.log(this.user);

            });
            },

            createPackageModalOpen(){
                this.createPackageModalShow = true;
            },
            createPackageModalClose(){
                this.createPackageModalShow = false;
            },
            deletePackageModalOpen(id){
                this.deleteId = id;
                this.showDeletePackageModal = true;
            },
            deletePackageModalClose(){
                this.showDeletePackageModal = false;
            },
            editFolderModalOpen(){
                this.eidtFolderModalShow = true;
            },
            editFolderModalClose(){
                this.eidtFolderModalShow = false;
            },
            deleteFolderModalOpen(){
                this.showDeleteFolderModal = true;
            },
            deleteFolderModalClose(){
                this.showDeleteFolderModal = false;
            },

            packageCreated(id){
                this.$router.push('/package/' + id + '/edit/')
            },

            deletePackage(){
                axios.delete('/api/packages/' + this.deleteId).then(response => {
                    this.getFolders();
                    this.deletePackageModalClose();
                });;
            },
            deleteFolder(){
                axios.delete('/api/folders/' + this.folders.id).then(response => {
                    this.$router.push('/edit-folders');
                    this.deleteFolderModalClose();
                });;
            },
            
           
        },
    }
</script>

<style lang="scss" scoped>

</style>