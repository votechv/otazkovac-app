<template>
    <div class="mainModal">
       <div class="mainModal__window">
            <div class="mainModal__window--head">
                <h4>{{title}}</h4>
                <i class="fa-solid fa-xmark" @click="closeModal()"></i>
            </div>
           <slot name="content"></slot>
       </div> 
    </div>
</template>

<script>
    export default {
        props:['title'],

        methods: {
            closeModal(){
                this.$emit('close');
            }
        },
    }
</script>

<style>

</style>