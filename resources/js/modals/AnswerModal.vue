<template>
   <transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
     <div class="AnswerModal">
     <div class="AnswerModal__window">
        <i class="fa-solid fa-circle-question"></i>
        <h2> {{content}}</h2>
         <a @click.prevent="close()" class="AnswerModal__close"> <i class="fa-solid fa-xmark"></i></a>
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
                this.$emit('closeAnswerModal');
            }
        },

        props:['content']
              
} 
      

</script>

<style lang="scss" scoped>

</style>