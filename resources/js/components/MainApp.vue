<template>

<div v-cloak class="app-spin">
 
    <div v-cloak class="app-spin__content">
        <h2> {{packages.name}} </h2>
        <div class="app-spin__content-text">
         <p> {{packages.text}} </p>   
        </div>
    </div> 

    

    <div class="app-spin__spin">
        <div class="app-spin__question"> 
            <transition enter-active-class="animate__animated animate__backInDown" leave-active-class="animate__animated animate__backOutDown">
                 <h3 v-if="visible"> {{choose}}</h3>
            </transition>
        </div>
        <button @click.prevent=" random()">SPIN</button>
    </div>




<div v-cloak class="links-app" v-if="packages.user_id === singleuser.id">
    <div class="links-app__single">
        <router-link :to="packages.id + '/edit'"> <i class="fas fa-pen"></i> </router-link>
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
            }
        },
    
        created() {
            axios.get('/api/packages/'+this.$route.params.id).then(response => {
                this.packages = response.data
            })
             .catch(error => {
                return this.$router.push('/package/404')
            })
            ;
            axios.get('/api/users/').then(response => {
                this.singleuser = response.data
            })
             .catch(error => {
                return this.$router.push('/package/404')
            })
            ;
   
        },
              
              computed: {
                numbersArray() {        
                    return this.createArrayOfNumber(0, this.packages.question.length -1);
                }
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


            

           

        
        }
    }
</script>

<style lang="scss" scoped>
    

</style>