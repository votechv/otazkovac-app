<template>
<div>
  <div class="mainFolders">
            <div class="headtop__info">          
        <div class="headtop__info--head">   
             <h2> Správce složek </h2>
        </div>
          <div class="headtop__info--buttons">
            <button @click="openNewModal()" class="headtop--mainButton"> <i class="fa-solid fa-plus"></i> Nová složka </button> 
        </div>
    </div>
        <div class="mainFolders__grid">
         <div  class="mainFolders__single" @click="openNewModal()">
            <div class="mainFolders__pseudo"> </div>
                <div class="mainFolders__single--add">    
                     <h2> <i style="color: #24695c" class="fa-solid fa-circle-plus"></i> </h2>
                </div>

         </div>

        <div class="mainFolders__single" v-for="folder in folders" :key="folder.id">
              <div @click="$router.push('/folder/' + folder.id + '/edit')" class="mainFolders__single-wrap">
             <div class="mainFolders__pseudo"> </div>

            <div class=" mainFolders__single--emoji">      
            <p>{{folder.emoji}}</p>
            </div>

           <div class="mainFolders__single--content">    
                <h2> {{folder.name}}</h2>
                <p> Vytvořeno: {{getDate(folder.created_at)}}</p>
            </div>
        </div>
          <i @click="learningSet(folder)" :class="{ 'mainFolders__single--color': folder.learn }" class="mainFolders__ico fa-solid fa-graduation-cap"></i>
        </div>

     </div>
  </div>

    <modal-template v-if="folderNewModal" v-on:closemodal="closeNewModal()" v-on:folderchanged="getFolders()"/>
    <ok-message title="Aktivní učení zapnuto" v-if="messageOk" @close="messageOk = false" content="Aktivní učení? Aktivní balíčky se řadí nahoru a vidíte statistiku v dashboardu."></ok-message>

</div>
</template>
<script>
import moment from 'moment'
import modalTemplate from '../components/ModalTemplate.vue'
import OkMessage from '../components/OkMessage'

    export default {
    
    name: "FoldersEdit",
    
    data() {
      return {
          folders: '',
          folderNewModal: false,
          messageOk: false,
      }
    },

    components:{
      modalTemplate, OkMessage
    },

    mounted() {
      this.getFolders();
    },
    

      methods: {
       getFolders(){
            axios.get('/api/folders/').then(response => {
                this.folders = response.data
                console.log(this.folders);
            })
               .catch(error => {
                //return this.$router.push('../../404')
            });
       },

       getDate(date){
       return  moment(date,'YYYY-MM-DD HH:mm:ss').format('DD.MM.YYYY');
      },

      openNewModal(){
          this.folderNewModal = true;
      },
      closeNewModal(){
          this.folderNewModal = false;
      },

      learningSet(folder){
        let data = {
          name: folder.name,
          emoji: folder.emoji,
          learn: !folder.learn,
        }
            axios.put('/api/folders/'+folder.id, data).then(response => {
                this.getFolders();
                if(data.learn == 1){
                  this.messageOk = true;
                }
            })
               .catch(error => {
                //return this.$router.push('../../404')
            });
      }

 
      },


        
           
}
      
</script>

<style lang="scss" scoped>

</style>