<template>
<div> 
    <template v-if="loadingbar"> 
        <div class="loadingdesign loadingclass"> </div>
    </template>

    <template v-else>
        <div class="app-spin" >
            <div class="app-spin__content" style="margin-top: 54px;">
               <div class="app-spin__content-left">
                    <p> {{folder.emoji}} {{folder.name}} </p>   
                    <h2> {{packages.name}} </h2>
                </div>
     
            </div> 

                <div class="prograssbar" style="width: 100%; background: transparent; height: 5px;" >
                    <a class="app-spin__button-answer" @click="openAnswerModal" v-if="answer != null && answer != ''"> <i class="fa-solid fa-circle-question"></i> </a>                
                </div>


            <div class="app-spin__spin">
                <div class="app-spin__question"> 
                    <transition enter-active-class="animate__animated animate__backInDown" leave-active-class="animate__animated animate__backOutDown">
                        <h3 v-if="visible"> {{choose}}</h3>
                    </transition>
                </div>
            </div>
            
             <div class="app-spin__button">
                <button @click.prevent="random()">SPIN</button>
            </div>
        </div>

    </template>

<answer-modal v-if="answerModal" @closeAnswerModal="closeAnswerModal" :content="answer" />
</div>
</template>

<script>
import AnswerModal from '../modals/AnswerModal'

import moment from 'moment'
    export default {
        data() {
            return {
                packages: [],
                choose: 'Aplikaci spustíte stisknutím tlačítka',
                singleuser: '',
                visible: true,
                loading: false,
                loadingbar: true,
                folders: [],
                answerModal: false,
                answer: null,
                youCanSpin: true, 
                folderid: null,
            }
        },

        components:{
            AnswerModal,
        },
    
        created() {
           this.getFolder();

        const d = new Date();
        this.date = d.getDay();

        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1; 
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();

        this.today = moment().format("YYYY-MM-DD");
        },
              
              computed: {
                numbersArray() {        
                    return this.createArrayOfNumber(0, this.packages.question.length -1);
                },

                    lengthArray() {        
                    return this.numbersArray.length;
                },
            },

        methods:{

            getRandomNumber(min, max){
            let totalEle = max - min;
            let result = Math.floor(Math.random() * totalEle) + min;
            return result;
        },

            createArrayOfNumber(start, end) {
                let myArray = [];
            
                for (let i = start; i <= end; i++) {
                    myArray.push(i);
                }

            return myArray;
                
            },

        random(){
        if(this.youCanSpin == true){
        this.youCanSpin = false
        let randomIndex = this.getRandomNumber(0, this.numbersArray.length - 1);
        let randomNumber = this.numbersArray[randomIndex];
        this.numbersArray.splice(randomIndex, 1);

        if(randomNumber > -2 && this.packages.question.length > 0){

        this.visible = false;

        setTimeout(() => this.choose = this.packages.question[randomNumber].text, 300);
        setTimeout(() => this.visible = true, 300);

        this.answer = this.packages.question[randomNumber].answer;

        }

        else if(this.packages.question.length < 1){
            this.choose = 'Naplňte svůj balíček otázkami 😊'
        }

        else{
            setTimeout(() => this.choose = 'Hurá 🎉 prošli jste všechny otázky v balíčku!', 300);  
         }

         setTimeout(() => {
             this.youCanSpin = true
         }, 1000);
    }

     },

         async getFolder(){
               await axios.get('/api/foldersoffline/').then(response => {
                   this.folders = response.data;
                   this.folders.forEach(folder => {
                       if(folder.slug == this.$route.params.slug){
                            this.folderid = folder.id;
                            this.folder = folder;
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
                       response.data.package.forEach(item => {
                            if(item.slug == this.$route.params.slug2){
                                    this.packages = item;
                                    this.loadingbar = false;
                            }
                   });

                    if(this.packages == ''){
                         window.location.href = "/404";
                    }
            })
               .catch(error => {
                 window.location.href = "/404";
            });
       },


        howMuchDone(){
          let vysledek = 100-((100 * this.numbersArray.length) / this.lengthArray);
            return vysledek;
        },

        closeAnswerModal(){
            this.answerModal = false;
        },
        openAnswerModal(){
            this.answerModal = true;
        },




            

           

        
        }
    }
</script>

<style lang="scss" scoped>
    

</style>