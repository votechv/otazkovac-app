<template>
   
        <div class="editpackage" v-show="packages.user_id == user.id">

         
        <div class="editpackage__data">
            <h1> {{packages.name}}<a @click.prevent="addFormData(packages)"> <i class="fas fa-pen"></i></a> </h1>
            <p> {{packages.text}}</p>
        </div>

        <div class="editpackage__table"> 
        <table>
            <tr>
                <th>Otázka</th>
                <th>Edit</th>
            </tr>

            <tr class="question" v-for="question in packages.question" :key="question.id">
            
                    <td class="long-question-text" :contenteditable="editing"> {{ question.text }} </td>

                    <td class="long-edit-links">  <a @click="deleteQuestion(question)"> <i class="fas fa-trash-alt"></i> </a> 
                    <a @click.prevent="addFormOtazka(question)"> <i class="fas fa-pen"></i> </a> 
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
                        <input @keydown.enter.prevent="editData(packages)" class="text-popup" type="text" v-model="text">
                        <a @click.prevent="editData(packages)" > <i class="far fa-save save-ico-pop"></i></a>
                    </form>
                    <a class="closepopup" @click.prevent="visiblepop2 = false"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>

<div v-cloak class="links-app-play">
    <div class="links-app-play__single">
        <router-link :to="'/package/'+ packages.id"> <i class="fas fa-play"></i> </router-link>
    </div>
</div>

        </div>



</template>

<script>
import {ref} from 'vue';
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
                    visiblepop2: false

                }
            },
            created() {
            axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
                
            });
     
            axios.get('/api/users/').then(response => {
                this.user = response.data
            });
        },

        methods: {
            submitForm() {
                let data = {
                    text: this.newQuestion,
                    user_id: this.user.id,
                    package_id: this.packages.id,
                    package_userid: this.packages.user_id,
                    package: this.packages
                }
                axios.post('/api/questions', data).then(response => {
                    this.newQuestion = ''
                   this.packages.question.push(data)
                   
                })

                
                
                axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
                 }); 

                
            },

              deleteQuestion(question){
                this.$root.$emit('flash', 'Otázka odstraněna');

               if(question.id) {

                
                axios.delete('/api/questions/' + question.id + '/');
                     
                axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
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


                  axios.patch('/api/questions/'+this.otazka_id, data); 

                  axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
                 });

                  this.visiblepop = false;


            },
            editData(information){
                let data = {
                    name: this.name,
                    text: this.text,
                }

                axios.patch('/api/packages/'+information.id, data); 

                    axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
                 });

                this.visiblepop2 = false;


            }


          
        },
        
    }
</script>

<style lang="scss" scoped>

</style>