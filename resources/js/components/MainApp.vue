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
            });
            axios.get('/api/users/').then(response => {
                this.singleuser = response.data
            });
   
        },
              

        methods:{
            mainSpin(){ 

            },
            random(){

                if(this.packages.question.length > 0){ 

                this.visible = false;
                var number = Math.floor(Math.random() * this.packages.question.length);
               
                setTimeout(() => this.choose = this.packages.question[number].text, 300);
                setTimeout(() => this.visible = true, 300);
                }
                else{
                    this.choose = 'Naplňte svůj balíček otázkami :)'
                }
                
            }, 

           

        
        }
    }
</script>

<style lang="scss" scoped>
    

</style>