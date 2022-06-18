<template>

    <div class="user-home__category">


        <!-- DOŘEŠIT, TAKHLE JE TO FAKT STRAŠNÝ ! POUŽÍT FLICKYTY NA SCROLL, BEZ ŠIPEK!! -->
        <div class="user-home__category--wrap" style="flex-direction: column">
        
    <modal-template v-if="popup" v-on:closemodal="closePop()" v-on:folderchanged="$emit('reloadFolder')"/>
        
    <edit-folder v-if="popupEdit" :folder="editFolderActual" v-on:closemodal="closePopupEdit()" v-on:reloadFolder="$emit('reloadFolder')"/>
    
      <div class="user-home__category--routerlinks">
      
          <button @click="openPop()" class="user-home__category--mainButton"> Vytvořit novou složku </button>
        <router-link :to="'/folders'">  <button class="user-home__category--mainButton"> Otevřít</button></router-link>
    </div>
        <carousel style="width:80%; margin: 0 auto;" :stagePadding="30" :responsiveClass="true" :loop="false" :nav="false" :dots="false" :responsive="{0:{items:1},1000:{items:2},1300:{items:4}, 1600:{items:4}}">

           
            {{popup2}}
           
    


            
            <div
            class="user-home__category--single"
            v-for="(folder, index) in folders" :key="index" 
            :class="{'active-category-class': index === indexOfCurrent}" 
            >

                <span class="user-home__category--emoji"> {{folder.emoji}} </span>

            <div class="user-home__category--informations">
                <h2> {{folder.name}} </h2>
                      <div class="user-home__category--buttons">
                        <button v-on:click="chooseFolder(folder.id, index)"> <i class="fas fa-play"></i> </button>
                        <button @click.prevent="editFolder(folder)"> <i class="fas fa-pen"></i></button> 
                      </div>
                </div>
       

            <span class="user-home__category--delete" v-on:click="openPopUpFolder(folder.id)"> <i class="fas fa-trash-alt"></i></span>

           
            </div>
    

          
        </carousel>

         <delete-modal 
         title="Opravdu si přejete odstranit celou složku?  Nenávratně budou odstraněny všechny balíčky i otázky v této složce!"
         v-if="showDeleteFolder"
         v-on:deleteFolder="deleteFolder()"
         v-on:closeDeleteFolder="showDeleteFolder = false"
         />

          <info-modal 
         title="Pokoušíte se odstranit poslední složku? To bohužel nelze 😔 Pokud si přejete tuto složku odstranit, nejdříve musíte vytvořit novou! 🥳 "
         v-if="showInfoModal"
         v-on:closeDeleteFolder="showInfoModal = false"
         />
           

        </div>
    </div>
</template>

<script>

import carousel from 'vue-owl-carousel'
import modalTemplate from './ModalTemplate.vue'
import deleteModal from '../modals/DeleteModal.vue'
import infoModal from '../modals/InfoModal.vue'
import EditFolder from '../modals/EditFolder'


export default {
name: "ListFolders",

    data() {
        return {
            popup: false,
            popup2: '',
            indexOfCurrent: 0,
            showDeleteFolder: false,
            idForDeleteFolder: null,
            showInfoModal: false,
            popupEdit: false,
            editFolderActual: '',
        }
    },

    components:{
  carousel, modalTemplate, deleteModal, infoModal,
        EditFolder
},


created() {

},

methods: {
    openPopUpFolder(id){
       this.showDeleteFolder = true,
       this.idForDeleteFolder = id;
    },
    openPop(){
         this.popup = false;

         if(this.popup == false){

             this.popup = true;
         }
    },

    closePop(){
        this.popup = false;
    },
    closePopupEdit(){
        this.popupEdit = false;
    },

    deleteFolder(){
       let id = this.idForDeleteFolder;

       if(this.folders.length > 1) {

        axios.delete('./api/folders/' + id).then(response => {
                
            if(response.status == 200){
                 this.$emit('reloadFolder');
            }
               
            });;
        }

        else{
           this.showInfoModal = true;

        }

},


    chooseFolder(id, index){
            this.indexOfCurrent = index;
            this.$emit('changeFolder', id, index);
            console.log(index.id);
    },

    editFolder(folder){
        this.popupEdit = true;
        this.editFolderActual = folder;
    }

   

},


 props: ['folders'],
 
}
</script>

<style scoped>
.carousel__item {
  min-height: 200px;
  width: 100%;
  background-color: var(--vc-clr-primary);
  color:  var(--vc-clr-white);
  font-size: 20px;
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel__slide {
  padding: 10px;
}

.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
}
</style>
