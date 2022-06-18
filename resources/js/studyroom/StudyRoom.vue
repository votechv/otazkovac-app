<template>
    <div class="studyroom">
    <info-modal 
    v-if="showinfoMix" title="Proč mixovat?" 
    content="Chcete se učit efektivně? Dodržujte naše metody! Nejefektivnější totiž není mít učivo organizovaně rozděleno do balíčků. Nejefektivnější je otázky procvičovat náhodně. Učení je tak náročnější a tím pádem si zapamatujete i více informací. "
    v-on:closeInfoModal="showinfoMix = false"
    />

    <info-modal 
    v-if="showinfoMegaMix" title="Co je to MegaMix? 🌎" 
    content="MegaMix vám pomáhá v nejefektivnějším učení. Vybere náhdoně 30 (nebo méně) otázek z jakékoliv složky či balíčku. To vám pomůže skutečně otestovat své znalosti! "
    v-on:closeInfoModal="showinfoMegaMix = false"
    />
        <div class="studyroom__intro">
            <h1>🎓 Studovna</h1>
            <p> „Učení samo má býti milé a libé a nemá se jinak díti, než jako hra a kratochvíle.“ <br> <span class="studyroom__intro--name"> Jan Amos Komenský </span></p>
        </div>

        <div class="studyroom__mix">
            <h2> Mixuju! <i @click.prevent="showinfoMix = true" class="fa-solid fa-circle-info"></i> </h2>

            <carousel  :stagePadding="30" :responsiveClass="true" :loop="false" :nav="false" :dots="false" :responsive="{0:{items:1},1000:{items:2},1300:{items:4}, 1600:{items:4}}">
            
            <div class="studyroom__mix--single">
                <span class="studyroom__mix--single--emoji"> 🌎  </span>
                <h2> MegaMix <i @click.prevent="showinfoMegaMix = true" class="fa-solid fa-circle-info"></i> </h2>
                <button><i class="fa-solid fa-shuffle"></i> PROCVIČIT </button>
            </div>
            <div class="studyroom__mix--single">
                <span class="studyroom__mix--single--emoji"> 💔 </span>
                <h2> Název balíčku </h2>
                <button><i class="fa-solid fa-shuffle"></i> PROCVIČIT </button>
            </div>
            <div class="studyroom__mix--single">
                <span class="studyroom__mix--single--emoji"> 💔 </span>
                <h2> Název balíčku </h2>
                <button><i class="fa-solid fa-shuffle"></i> PROCVIČIT </button>
            </div>
            <div class="studyroom__mix--single">
                <span class="studyroom__mix--single--emoji"> 💔 </span>
                <h2> Název balíčku </h2>
                <button><i class="fa-solid fa-shuffle"></i> PROCVIČIT </button>
            </div>
            <div class="studyroom__mix--single">
                <span class="studyroom__mix--single--emoji"> 💔 </span>
                <h2> Název balíčku </h2>
                <button><i class="fa-solid fa-shuffle"></i> PROCVIČIT </button>
            </div>
          
        </carousel>
        </div>
    </div>
</template>

<script>
import InfoModal from './InfoModal'
import carousel from 'vue-owl-carousel'
    export default {
        data() {
            return {
                showinfoMix: false,
                showinfoMegaMix: false,
            }
        },
        components:{
          InfoModal, carousel
        
        }

    }
</script>

<style lang="scss" scoped>

</style>