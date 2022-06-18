<template>
   <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
     <div class="studyroom__modal">
     <div class="studyroom__modal--window">
        <i class="fa-solid fa-circle-info"></i>
        <h2> {{title}}</h2>
        <p> {{content}}</p>
         <a @click.prevent="close()" class="studyroom__modal--close"> <i class="fa-solid fa-xmark"></i></a>
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
            close(){
                this.$emit('closeInfoModal');
            }
        },

        props:['title', 'content']
              
} 
      

</script>

<style lang="scss" scoped>

</style>