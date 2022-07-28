<template>
  
  <div> 

   <div class="loadingdesign"  :class="{loadingclass : loadingcl}"> 
   </div>
<div v-cloak class="app-spin" v-if="loading">

 
    <div v-cloak class="app-spin__content">
        <h2> {{packages.name}} - mix </h2>
        <h1> {{numbersArray.length}}</h1>
    </div> 

    <div class="prograssbar" style="width: 100%; background: white; height: 5px;" >
        <div class="prograssbarr" :style="'width:'+procent() +'% ; height: 5px; background: black;'">
        
        </div>
    </div>


{{procent()}}


    

    <div class="app-spin__spin">
        <div class="app-spin__question"> 
            <transition enter-active-class="animate__animated animate__backInDown" leave-active-class="animate__animated animate__backOutDown">
                 <h3 v-if="visible"> {{choose}}</h3>
            </transition>
        </div>
        <button @click.prevent=" random()">SPIN</button>
    </div>


</div>
</div>


</template>

<script>
    export default {
        data() {
            return {
                packages: [],
                choose: 'Aplikaci spustíte stisknutím tlačítka',
                singleuser: '',
                visible: true,
                loading: false,
                loadingcl: true,
                folders: []
            }
        },
    
        created() {

            axios.get('/api/users').then(response => {
                this.singleuser = response.data
                this.loading = true

                this.loadingcl = false
            })
             .catch(error => {
                return this.$router.push('../404')
            })
            ;

            axios.get('/api/folders/'+this.$route.params.id).then(response => {
                this.packages = response.data
            })
             .catch(error => {
               return this.$router.push('../404')
            });

   
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

        let randomIndex = this.getRandomNumber(0, this.numbersArray.length - 1);
        let randomNumber = this.numbersArray[randomIndex];
        this.numbersArray.splice(randomIndex, 1);

        if(randomNumber > -2 && this.packages.question.length > 0){

        this.visible = false;

        setTimeout(() => this.choose = this.packages.question[randomNumber].text, 300);
        setTimeout(() => this.visible = true, 300);
        }

        else if(this.packages.question.length < 1){
            this.choose = 'Naplňte svůj balíček otázkami 😊'
        }

        else{
            setTimeout(() => this.choose = 'Hurá 🎉 prošli jste všechny otázky v balíčku!', 300);  
        
        }
},


        procent(){
          let vysledek = (100 * this.numbersArray.length) / this.lengthArray;

            return vysledek;
        },


            

           

        
        }
    }
</script>

<style lang="scss" scoped>
    

</style>