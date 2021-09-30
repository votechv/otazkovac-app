<template>
<div>
<div class="loadingdesign"  :class="{loadingclass : loadingcl}"> 
</div>

<div class="user-home" v-if="loading">
   
    <div v-cloak class="user-home__content">
        <h2> Všechny otázky uživatele: {{users.name}}</h2>
    </div> 


    <div class="indexpackage"> 
        <div class="indexpackage__wrap"> 
                <div class="indexpackage__single">
                 <input class="input-h3" autocomplete="off" @keydown.enter.prevent="submitForm()" type="text" name="name" v-model="newName">
                <input class="input-p" autocomplete="off" @keydown.enter.prevent="submitForm()"  type="text" name="text" v-model="newText">
                     <i @click.prevent="submitForm()" class="fas fa-plus-square"></i> 
            </div>
      <!--  <h2 class="index-title">Balíčky uživatele {{users.name}} </h2> --> 
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

    </div>

</template>

<script> 
import MessageOk from './MessageOk'
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
              
            } 
        },
          props: {
            userid: {
                type: Number,
            },
          },

           created() {
            axios.get('./api/packages').then(response => {
                this.packages = response.data

                
            },
            );
            axios.get('./api/users', ).then(response => {
                
                this.users = response.data

                this.loading = true
                this.loadingcl = false
                 
            },
          

            );

        

        },

        components:{
            MessageOk
        },
        methods: {
            deleteShow(single){
                this.visiblepop = true;
                this.deleteid = single;
            },

            refresh(){
                this.loadingcl = true

                axios.get('./api/packages').then(response => {
                    this.packages = response.data

                    this.loadingcl = false
                });
            },
            submitForm() {
                let data = {
                    name: this.newName,
                    text: this.newText,
                    user_id: this.users.id,
                }

                this.newName = '',
                this.newText = ''

                   axios.post('./api/packages', data).then(response => {
                       this.$router.push('/package/' + response.data.id.id + '/edit/')
                
                   });

                 
            },

            deletePackage(){
                 axios.delete('./api/packages/' + this.deleteid).then(response => {
                    this.refresh();
                   });;
                 
            this.visiblepop = false;

            }

             
        },
       
    }
</script>

<style lang="scss" scoped>

</style>