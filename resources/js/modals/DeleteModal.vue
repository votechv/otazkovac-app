<template>
   <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
        <div class="popup-form">
            <div class="popup-form__inner">
                   <form class="delete-message" >
                       <p class="delete-message" style="text-align: center; line-height: 120%"> {{title}} </p>
                        <div class="buttons">
                        <button class="zrusit" @click.prevent="closeDeleteFolder()"> Zrušit</button>
                        <button class="delete" @click.prevent="deleteFolder()"> Odstranit </button>
                        </div>
                    </form>
                    <a class="closepopup" @click.prevent="closeDeleteFolder()"> <i class="fas fa-times"></i></a>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
    
    name: "DeleteModal",
    
    data() {
        return {

        }
    },

        methods: {
           deleteFolder(){
               this.$emit('deleteFolder', true);
           },
           closeDeleteFolder(){
               this.$emit('closeDeleteFolder', true);
           }
        },

        props:['title'],
        
           
} 
      

</script>

<style lang="scss" scoped>

</style>