<template>
    <div class="checklist">
        <div class="checklist__head">
                <div class="checklist__head-chart">
                    <div id="chart">
                     <apexchart type="radialBar" height="200px" :options="chartOptions" :series="series"></apexchart>
                    </div>
                </div>
        </div>


        <div class="checklist__list">
            <ul>
             <draggable v-model="myList">
                 <transition-group name="flip-transition">
                    
                    <li  
                    :class="{checklist__visible : isDoneVisible}"
                    v-for="item in myList" 
                    @click="showDone(item.order)" 
                    :key="item.order">   
                
                        <div class="checklist__list-check">
                            <div class="checklist__list-check--circle"></div>
                        </div>
                        <div class="checklist__list-content">
                        {{ item.name }}
                        </div>

                    </li>

                </transition-group>
             </draggable>
            </ul>

   <!--         <ul class="checklist__list-add">
                <li class="checklist__list--green"> Další zelený úkol :D </li>
                <li class="checklist__list--orange"> Další oranžový úkol </li>
                <li>Přdiat nový úkol...</li>
            </ul>
 -->
        </div>


            <div class="checklist__buttons">
                <button class="headtop--mainButton" @click="true"> <i class="fa-solid fa-pen"></i>Editovat </button> 
                <button class="headtop--singleButton"> <i class="fa-solid fa-circle-plus"></i>  </button>
            </div>
    
    </div>
</template>

<script>
import VueApexCharts from 'vue-apexcharts'
import draggable from "vuedraggable";
    export default {
        data() {
            return {
                series: [90],
                isDoneVisible: false,
                itemIndex: 1,
                chartOptions: {
                    colors: ['#3ee302'],
                    chart: {
                        height: 350,
                        type: 'radialBar',
                    },
                    plotOptions: {
         
                    radialBar: {
                        hollow: {
                         size: '70%',
                        },
                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: 30,
                            show: true,
                            color: '#888',
                            fontSize: '12px'
                        },
                           value: {
                    offsetY: -5,
                    fontSize: '35px',
                    color: undefined,
             
                    }
                    },
                    },
                    },
                    labels: ['Dokončeno'],
                },
           myList: [
        { name: "První úkol v seznamu úkolů a je to ten nejdůležitější čéééče a to vím protože to vím a taky to vím", order: 1 },
        { name: "First Item", order: 3 },
        { name: "Second Item", order: 2 },
        { name: "Jeden z nejdůležitějších úkolů", order: 2 },
        { name: "Pracovat na projektu který je", order: 2 },
      ],

            }
        },

        components:{
            VueApexCharts, draggable
        },
        methods: {
            detectMove: function(evt){
                console.log(evt)
            },

            showDone(item){
             this.itemIndex = item;
             console.log(this.itemIndex);
            },
            taskDone(){
               console.log("čau")
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>