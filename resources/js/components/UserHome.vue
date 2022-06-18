<template>
<div>
<div class="loadingdesign"  :class="{loadingclass : loadingcl}">
</div>

<div class="user-home" v-if="loading">



    <div class="indexpackage">

    <ListFolders :folders="folders" v-if="foldersLoading" v-on:reloadFolder="reloadFolders()" v-on:changeFolder="switchFolder"/>
      
      <!-- 
        <div class="indexpackage__wrap">
                <div class="indexpackage__single">
                 <input class="input-h3" autocomplete="off" @keydown.enter.prevent="submitForm()" type="text" name="name" v-model="newName">
                <input class="input-p" autocomplete="off" @keydown.enter.prevent="submitForm()"  type="text" name="text" v-model="newText">
                     <i @click.prevent="submitForm()" class="fas fa-plus-square"></i>
            </div>

            -->
      <!--  <h2 class="index-title">Balíčky uživatele {{users.name}} </h2> -->


       <!--
           <div class="indexpackage__single" v-for="single in packages" :key="single.id">
                <h2> {{ single.name }} </h2>
                <p> {{single.text}}</p>
               <div class="indexpackage__content">
                    <div class="indexpackage__content__middle">
                           <router-link :to="'/package/' + single.id"> <i class="fas fa-play"></i> </router-link>
                        <div class="indexpackage__content__middle-icon">
                            <router-link :to="'/package/' + single.id +'/edit' ">  <i class="fas fa-pen"></i></router-link>
                            <a  @click.prevent="deleteShow(single.id)">  <i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>

         
 -->

 <list-packages :packages="packages" :folder="currentFolderId" :emoji="this.folders[this.currentIndex]" v-on:refreshPackage="getPackages()" />




   <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
        <div class="popup-form" v-if="visiblepop">
            <div class="popup-form__inner">
                   <form class="delete-message" >
                       <p class="delete-message"> Opravdu si přejete odstranit balíček i s jeho otázkami? </p>
                        <div class="buttons">
                        <button class="zrusit" @click.prevent="visiblepop = false"> Zrušit</button>
                        <button class="delete" @click.prevent="deletePackage()"> Odstranit </button>
                        </div>
                    </form>
                    <a class="closepopup" @click.prevent="visiblepop = false"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>



          <!--       <div class="indexpackage__single">

                        <input type="text" name="name" v-model="newName">
                        <input type="text" name="text" v-model="newText">
                        <button @click="submitForm()"> ULOŽIT </button>


                </div> -->


            </div>

         </div>
        </div>


</template>

<script>
import MessageOk from './MessageOk'
import ListFolders from './ListFolders'
import ListPackages from '../packages/ListPackages'


    export default {
        data() {
            return {
                users: [],
                packages: [],
                newName: '',
                newText: '',
                deleteId: '',
                visiblepop: false,
                loading: false,
                loadingcl: true,
                sliderka: '',
                foldersLoading: false,
                loading: false,
                folders: [],
                folder: [],
                currentFolderId: null,
                currentIndex: 0,
        }
        },
          props: {
            userid: {
                type: Number,
            },
          },



           created() {

            axios.get('./api/users', ).then(response => {

                this.users = response.data

                this.loading = true
                this.loadingcl = false

            });
           

            axios.get('./api/folders/').then(response => {

                if(response.data.length > 0){

               
                this.folder = response.data 

                this.currentFolderId =  this.folder[0].id;
                this.reloadFolders();
                this.getPackages();
                 }
                 else{
                     this.createIfLenghtZero();
                
                this.reloadFolders();
                this.getPackages();
                     
                    
                 }
            })
             .catch(error => {
                
            });



        },

    


        components:{
            MessageOk, ListFolders, ListPackages,
        
        },
        methods: {

        /*
        *
        *   FOLDERS
        * 
        */


        createIfLenghtZero() {
                let data = {
                    name: "Otázkovac",
                    emoji: "E",
                    user_id: this.users.id,
                    
                }
              
              axios.post('./api/folders', data).then(response => {
                       
                    if(response.status == 200){
                        this.$emit('folderchanged');

                        console.log(response.data);


                       }


                   });


            },
            
            reloadFolders(){
                 // TATO FUNKCE NAČÍTÁ SLOŽKY. ZÁROVEŇ PŘI NAČTENÍ STRÁNKY URČUJE, KTERÁ SLOŽKA BUDE ZOBRAZENA JAKO OTEVŘENÁ. 
                 
                 this.foldersLoading = false;
                 axios.get('./api/folders').then(response => {

                    
                    
                    this.folders = response.data

                    this.foldersLoading = true;

                    this.currentFolderId = response.data[0].id;
                    console.log("ReloadFolders: id" +  response.data[0].id );

                     

                    this.getPackages();
                    
                               
                })
                .catch(error => {
                    
                });
            },

            getPackages(){
                // TATO FUNKCE JAKO JEDINÁ VOLÁ KONKRÉTNÍ SLOŽKU PRO ZOBRAZENÍ!! V API JSOU VŽDY JEN BALÍČKY AKTUÁLNĚ VYBRANÉ SLOŽKY!
        
                axios.get('/api/folders/'+this.currentFolderId).then(response => {
                this.packages = response.data.package;
         
                })
                
                .catch(error => {
                    console.log("nepovedlo se :/")
                });

              },


            switchFolder(id, index){
                // PŘEPÍNÁNÍ MEZI JEDNOTLIVÝMI SLOŽKAMI 
                
                this.currentFolderId = id;
                this.currentIndex = index;

                this.getPackages();
            },


    


        /*
        *
        *   PACKAGES
        * 
        */

          
            submitForm() {
                // VYTVOŘENÍ NOVÉHO BALÍČKU V PODSLOŽKÁCH JIŽ!!!
                let data = {
                    name: this.newName,
                    text: this.newText,
                    user_id: this.users.id,
                    folder_id: this.currentFolderId
                }

                this.newName = '',
                this.newText = ''

                   axios.post('./api/packages', data).then(response => {
                       this.$router.push('/package/' + response.data.id.id + '/edit/')

                   });


            },

            deletePackage(){
                // ODSTRANENÍ BALÍČKU V PODSLOŽCE
                 axios.delete('./api/packages/' + this.deleteid).then(response => {
                    this.refresh();
                   });;

            this.visiblepop = false;

            },

      

            deleteShow(single){
                    // MODÁLNÍ OKNO PRO ODSTRANĚNÍ BALÍČKU

                    this.visiblepop = true;
                    this.deleteid = single;
                },
    
    
    },

       

    }
</script>

<style lang="scss" scoped>

</style>
