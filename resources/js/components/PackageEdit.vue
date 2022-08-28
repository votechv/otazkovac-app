<template>

<div> 

   <div class="loadingdesign"  :class="{loadingclass : loadingcl}"> 
   </div>
        <div class="editpackage" v-if="loading && user.id === packages.user_id">

         
        <div class="editpackage__data">
            <h1>  {{packages.name}}<a @click.prevent="addFormData(packages)"> <i class="fas fa-pen"></i></a>  <a @click.prevent="adminPublicModal =true"><i class="fa-solid fa-earth-americas"></i></a></h1>
            <p> {{packages.text}}</p>
        </div>
  
        <div class="editpackage__table"> 
        <table>
            <tr>
                <th class="long-question-text">Otázka</th>
                <th>Edit</th>
            </tr>

            <tr class="question" v-for="question in packages.question" :key="question.id">
            
                    <td class="long-question-text" :contenteditable="editing"> {{ question.text }} </td>

                    <td class="long-edit-links">  
                    <a @click.prevent="addFormOtazka(question)"> <i class="fas fa-pen"></i> </a> 
                    <a @click.prevent="addAnswer(question)"> <i class="fa-solid fa-circle-plus"></i> </a> 
                     <a @click="deleteQuestion(question)"> <i class="fas fa-trash-alt"></i> </a> 
                    </td> 
                    
            </tr>
        </table>
        </div>

    <div class="editpackage__formain">
        <input placeholder="Nová otázka..." class="addquestion" v-on:keyup.enter="submitForm()" type="text" name="question" v-model="newQuestion">
        <a @click.prevent="submitForm()"> <i class="fas fa-plus-square plus-form"></i></a>
    </div>

    <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
        <div class="popup-form" v-if="visiblepop">
            <div class="popup-form__inner">
                   <form>
                        <input @keydown.enter.prevent="editQuestion(otazka)" type="text" v-model="otazka">
                        <a @click.prevent="editQuestion(otazka)" > <i class="far fa-save save-ico-pop"></i></a>
                    </form>
                    <a class="closepopup" @click.prevent="visiblepop = false"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>

    <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
        <div class="popup-form" v-if="visiblepop2">
            <div class="popup-form__inner">
                   <form >
                        <input @keydown.enter.prevent="editData(packages)" type="text" v-model="name">
                    
                        <a @click.prevent="editData(packages)" > <i class="far fa-save save-ico-pop"></i></a>
                    </form>
                    <a class="closepopup" @click.prevent="visiblepop2 = false"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>

    <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
        <div class="popup-form" v-if="visibleAddAnswer">
            <div class="popup-form__inner">
                        <p> Zde můžete zadat odpověď na otázku: </p>

                        
                        <textarea class="form-control w-100 p-3"  @keydown.enter.prevent="editAnswer()" type="text" v-model="newAnswer"> </textarea>
                    
                        <a @click.prevent="editAnswer()" > <i class="far fa-save save-ico-pop"></i></a>
                    <a class="closepopup" @click.prevent="visibleAddAnswer = false"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>

<div v-cloak class="links-app-play">
    <div class="links-app-play__single">
        <a :href="'/package/'+ packages.id"> <i class="fas fa-play"></i> </a>
    </div>
</div>

        </div>

        <main-modal v-if="adminPublicModal && user.id == 1"  @close="adminPublicModal = false" title="Publikace složky"> 
  <template v-slot:content>
  <div class="text-center"> 
    <h2 style="text-center">  {{packages.name}} </h2>
    <p> Slug musí být vyplněn!!</p>
   
 
    <input type="text" style="background: #7a0000; color: white; font-weight:bold; border: none; padding: 10px 7px; font-size: 15px;" v-model="adminSlug">

    <button class="btn btn-primary" @click="justAdminSlug()"> Uložit</button>

    <p> Aktuální slug {{packages.slug}}</p>
    </div>
    </template>
</main-modal>
        </div>



</template>

<script>
import {ref} from 'vue';
import MainModal from '../components/MainModal.vue'
    export default {
            data() {
                return {
                    packages: [],
                    user: '',
                    newQuestion: '',
                    editing: false,
                    otazka: '',
                    name: '',
                    text: '',
                    otazka_id: '',
                    visiblepop: false,
                    visiblepop2: false,
                    loading: false,
                    loadingcl: true, 
                    visibleAddAnswer: false,
                    newAnswer: '',
                    answer_id: '',
                    adminPublicModal: false,
                    adminSlug: '',
                    done: ''


                }
            },

            components:{
                MainModal
            },

           
            created() {
                axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data;
                this.adminSlug = response.data.slug;
            })
             .catch(error => {
                return this.$router.push('../../404')
            })
            ;
     
            axios.get('/api/users').then(response => {
                this.user = response.data
                this.loading = true

                this.loadingcl = false
            })
               .catch(error => {
                return this.$router.push('../../404')
            });
        },

        methods: {

             refresh(){
                 this.loadingcl = true
               axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
                
                this.loadingcl = false
                 }); 
            },

            submitForm() {
                let data = {
                    text: this.newQuestion,
                    user_id: this.user.id,
                    package_id: this.packages.id,
                    folder_id: this.packages.folder_id,
                    package_userid: this.packages.user_id,
                    package: this.packages
                }
                 this.newQuestion = ''
                 


                axios.post('/api/questions', data).then(response => {
                    this.refresh();
                    this.$emit('refquestion');
                })

                
                
               

                
            },

            addAnswer(question){
                this.visibleAddAnswer = true;
                this.newAnswer = question.answer;
                this.answer_id = question.id;
            },



              deleteQuestion(question){
                this.$root.$emit('flash', 'Otázka odstraněna');

               if(question.id) {

                
                axios.delete('/api/questions/' + question.id).then(response => {
                    this.refresh();
                   });
                     
              

                }

            else{
                console.log('Toto id neexistuje');
            }       
            },

            addFormOtazka(question){
                let data = {
                    text: this.otazka,
                }

                this.visiblepop = true;
                this.otazka = question.text;
                this.otazka_id = question.id;
                
            },

            addFormData(information){
                let data = {
                    name: this.name,
                    text: this.text
                }

                this.visiblepop2 = true;
                this.name = information.name;
                this.text = information.text;

            },



            editQuestion(otazka){
                let data = {
                    text: this.otazka,
                }


                  axios.patch('/api/questions/'+this.otazka_id, data).then(response => {
                    this.refresh();
                   });; 

          

                  this.visiblepop = false;


            },

            editAnswer(otazka){
                let data = {
                    answer: this.newAnswer,
                }


                  axios.patch('/api/questions/'+this.answer_id, data).then(response => {
                    this.refresh();
                   });; 

          

                  this.visibleAddAnswer = false;


            },
            editData(information){
                let data = {
                    name: this.name,
                }

                axios.patch('/api/packages/'+information.id, data).then(response => {
                    this.refresh();
                   });; 

                  

                this.visiblepop2 = false;


            },

            justAdminSlug(){
                let data = {
                    name: this.packages.name,
                    slug: this.adminSlug
                }

                axios.patch('/api/packages/'+this.packages.id, data).then(response => {
                    this.refresh();
                   });; 
            }


          
        },
        
    }
</script>

<style lang="scss" scoped>

</style>