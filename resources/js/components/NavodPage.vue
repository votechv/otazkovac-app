<template>
   <div class="navod-page">

    <div class="navod-page__rozcesti">
        <div class="navod-btn" @click.prevent="AddPackage()">
            <h5 class="number"> 1 </h5>
            <h6> Přidávání balíčků </h6>
        </div>
        <div class="navod-btn" @click.prevent="AddQuestion()" >
             <h5 class="number"> 2 </h5>
            <h6> Přidávání otázek </h6>
        </div>
        <div class="navod-btn" @click.prevent="editPackage()">
             <h5 class="number"> 3 </h5>
            <h6> Úpravy balíčků</h6>
        </div>
        <div class="navod-btn" @click.prevent="deletePackage()" > 
             <h5 class="number"> 4 </h5>
            <h6> Odstranění balíčků </h6>
        </div>
        <div class="navod-btn" @click.prevent="spinn()"> 
            <h5 class="number"> 5 </h5>
            <h6> Učte se </h6>
            </div>
    </div>
<transition enter-active-class="animate__animated animate__zoomIn" leave-active-class="animate__animated animate__zoomOut"> 
    <div class="navod-page__content" v-if="visible">
        <div class="navod-page__top">
            <img :src="picture" alt="picture-otazkovac">
         </div>

        <div class="navod-page__bottom">
            <h3> {{heading}}</h3>
            <p class="text-short">{{text}}</p>
        </div>
    </div>
</transition>
</div>

</template>

<script>
    export default {

        data() {
            return {
                heading: 'Přidávání balíčků',
                text: 'V sekci "Moje otázky" můžete jednoduše přidávat nové balíčky. Aby mohl být balíček vytvořený, musí být vyplněné jméno i popisek!',
                picture: '/cdn/cut-add-package.gif',
                visible: true,

            }
        },

        methods: {
            AddPackage() {
                this.visible = false
                this.heading = "Přidávání balíčků"
                this.text = 'V sekci "Moje otázky" můžete jednoduše přidávat nové balíčky. Aby mohl být balíček vytvořený, musí být vyplněné jméno i popisek!'
                this.picture = '/cdn/cut-add-package.gif'

                setTimeout(() => this.visible = true, 300);   
            },
        
            AddQuestion() {
                this.visible = false
                this.heading = "Přidávání otázek"
                this.text = 'Přidávání nových otázek je možné pouze ve vámi vytvořených balíčcích. Musíte myší najet na balíček v sekci "Moje otázky", kliknout na ikonku tužky a následně pomocí inputu v dolní části obrazovky přidávat nové otázky. '
                this.picture = '/cdn/cut-add-questions.gif'

                setTimeout(() => this.visible = true, 300);   
            },
            editPackage() {
                this.visible = false
                this.heading = "Úpravy balíčků"
                this.text = 'Pro úpravy balíčků musíte myší najet na balíček v sekci "Moje otázky", kliknout na ikonku tužky a následně pomocí ikonek editovat balíček. Balíček je možné přejmenovávat, upravovat jeho popisek, upravovat jeho otázky, přidávat nové otázky nebo mazat jeho otázky. '
                this.picture = '/cdn/cut-edit-pacakge.gif'

                setTimeout(() => this.visible = true, 300);   
            },
            deletePackage() {
                this.visible = false
                this.heading = "Mazání balíčků"
                this.text = 'Mazání balíčků je možné v sekci "Moje otázky". Najeďte myší na balíček, který chcete smazat, následně klikněte na ikonku popelnice a potvrďte pop-up okno.'
                this.picture = '/cdn/cut-delete-package.gif'

                setTimeout(() => this.visible = true, 300);   
            },
            spinn() {
                this.visible = false
                this.heading = "Učte se!"
                this.text = 'Po vytvoření balíčku můžete hned začít s učením. Algoritmus otázkovače je momentálně v beta verzi, různá rozšíření pro lepší učení budeme postupně přidávat.'
                this.picture = '/cdn/otazkovac-spin-small.gif'

                setTimeout(() => this.visible = true, 300);   
            },
        },
        
    }
</script>

<style lang="scss" scoped>

</style>