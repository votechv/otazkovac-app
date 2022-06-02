<template>
    <div>
          <transition name="fade">
        <div class="message-green" v-if="visible">
            <div class="message-green__content">
                <a @click.prevent="hide()"> <i class="fas fa-times"></i> </a>
                <p> ahoj test </p>
            </div>
        </div>
     </transition>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                visible: false,
                message: ''
            }
        },
        props:['text'],

        created(){ 
            if(this.text){

           this.message = this.text
            this.show()
             }
             this.$root.$on('flash', message => {
                 this.text = message
                 this.show()
             })

        },
        methods:{
            show(){
                this.visible = true;

                setTimeout(() => {
                    this.hide()
                }, 2000);

            },
            hide(){
                this.visible = false;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>