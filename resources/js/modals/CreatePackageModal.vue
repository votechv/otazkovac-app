<template>
    <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
        <div class="popup-form">
            <div class="popup-form__inner">
                   <form>
                        <input @keydown.enter.prevent="createPackage()" type="text" v-model="packageName">
                        <a @click.prevent="createPackage()" > <i class="far fa-plus-square save-ico-pop"></i></a>
                    </form>
                    <a class="closepopup" @click.prevent="closeCreatePackage()"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
    
    name: "CreatePageModal",
    
    data() {
        return {
            packageName: '',
        }
    },

    methods: {
           closeCreatePackage(){
               this.$emit('closeModalCreatePackage');
           },
           reloadPackage(){
                this.$emit('refreshPackage');
           },
            createPackage() {
                // VYTVOŘENÍ NOVÉHO BALÍČKU V PODSLOŽKÁCH JIŽ!!!
                let data = {
                    name: this.packageName,
                    user_id: this.user.id,
                    folder_id: this.folder_id
                }

                this.newName = '',
                this.newText = ''

                   axios.post('./api/packages', data).then(response => {
                       //this.$router.push('/package/' + response.data.id.id + '/edit/')
                        this.closeCreatePackage();
                        this.reloadPackage();
                   });


            },
        },

        props:['title', 'user', 'folder_id'],
        
           
}  
      

</script>

<style lang="scss" scoped>

</style>