<template>
<div>
  <div class="mainFolders">
      <h2 class="mainFolderh2">Vaše složky</h2>
     <div class="mainFolders__grid">
        <div @click="$router.push('/folder/' + folder.id)" class="mainFolders__single" v-for="folder in folders" :key="folder.id">
       <div class="mainFolders__pseudo"> </div>
        <div class=" mainFolders__single--emoji">      
          <p>{{folder.emoji}}</p>
        </div>
           <div class="mainFolders__single--content">    
                <h2> {{folder.name}}</h2>
                <p> Vytvořeno: {{getDate(folder.created_at)}}</p>
            </div>


        
        </div>
     </div>
  </div>
</div>
</template>

<script>
import moment from 'moment'
import VueApexCharts from 'vue-apexcharts'
    export default {
    
    name: "MainFolders",
    
    data() {
      return {
          folders: '',
           series: [70],
            chartOptions: {
              chart: {
                height: 350,
                type: 'radialBar',
              },
              colors:['#80d100'],
                legend: {
                show: false,
               },
              plotOptions: {
                radialBar: {
                  hollow: {
                    size: '50%',
                  },
                   dataLabels: {
                    show: false
                  },
                },
              },
              labels: [''],
          },
      }
    },

    components:{
      VueApexCharts,
    },

    mounted() {
      this.getFolders();
    },
    

      methods: {
       getFolders(){
            axios.get('/api/folders/').then(response => {
                this.folders = response.data
                console.log(this.folders);
            })
               .catch(error => {
                //return this.$router.push('../../404')
            });
       },

       getDate(date){
       return  moment(date,'YYYY-MM-DD HH:mm:ss').format('DD.MM.YYYY');
      }

 
      },
        
           
}
      

</script>

<style lang="scss" scoped>

</style>