<template>
  <div> 
    <template v-if="loadingbar"> 
        <div class="loadingdesign loadingclass"> </div>
    </template>

    <template v-else>
        <div class="app-spin" v-if="loading">
 
            <div class="app-spin__content">
               <div class="app-spin__content-left">
                    <p> {{folderEmoji}} {{folderName}} </p>   
                    <h2> {{packages.name}} </h2>
                </div>
               <div class="app-spin__content-right">
                    <router-link :to="packages.id + '/edit'"> <i class="fas fa-pen"></i> </router-link>
                </div>
            </div> 

                <div class="prograssbar" style="width: 100%; background: transparent; height: 5px;" >
        <div class="prograssbarr" :style="'width:'+howMuchDone() +'%; height: 2px; background: #24695c;'">
        
        </div>
    </div>

    
            <div class="app-spin__spin">
                <div class="app-spin__question"> 
                    <transition enter-active-class="animate__animated animate__backInDown" leave-active-class="animate__animated animate__backOutDown">
                        <h3 v-if="visible"> {{choose}}</h3>
                    </transition>
                </div>
            </div>
            
             <div class="app-spin__button">
                <button @click.prevent=" random()">SPIN</button>
            </div>

</div>

</template>

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
                loadingbar: true,
                folders: [],
                folderName: '',
                folderEmoji: '',
            }
        },
    
        created() {
           this.getPackages();
           this.getUsers();
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

       async getPackages(){
           await axios.get('/api/packages/'+this.$route.params.id).then(response => {
                        this.packages = response.data

                        this.getFolders();
                    })
                    .catch(error => {
                        return this.$router.push('../404')
                    });
        },

        async getUsers(){

           await axios.get('/api/users').then(response => {
                this.singleuser = response.data
                this.loading = true

                this.loadingbar = false
            })
             .catch(error => {
                return this.$router.push('../404')
            });

        },

        async getFolders(){
            await axios.get('/api/folders/' + this.packages.folder_id).then(response => {
                this.folder = response.data
                console.log(this.folder);
                this.folderName = response.data.name;
                this.folderEmoji = response.data.emoji;
            })
                .catch(error => {
                        return this.$router.push('../404')
            });
        },

        howMuchDone(){
          let vysledek = 100-((100 * this.numbersArray.length) / this.lengthArray);
            return vysledek;
        }




            

           

        
        }
    }
</script>

<style lang="scss" scoped>
    

</style>