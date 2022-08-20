<template>
<transition  enter-active-class="animate__animated animate__fadeIn animate__faster" leave-active-class="animate__animated animate__fadeOut animate__faster">
    <div class="okmessage">
        <div class="okmessage__smile">
            <i class="fa-solid fa-face-smile"></i>
        </div>
        <div class="okmessage__content">
            <h2> {{title}} </h2>
            <p> {{content}}</p>
        </div>

    </div>
</transition>
</template>

<script>
    export default {
        props: ['title', 'content'],

        mounted(){
            setTimeout(() => {
                this.$emit('close');
            }, 3000);
        }
    }
</script>

<style lang="scss" scoped>

</style>