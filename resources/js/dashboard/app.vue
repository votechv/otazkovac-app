<template>
    <div class="dashboard">
        <habit-done :procent="series"></habit-done>
        <habit-days></habit-days>
        {{arrayDays}}
    </div>
</template>

<script>
import HabitDone from './HabitDone'
import HabitDays from './HabitDays'
import moment from 'moment'
    export default {
        data() {
            return {
                date: '',
                plantimesTime: '',
                procenta: '',
                series: '',
                arrayDays: [],
            }
        },
        components:{
            HabitDone, HabitDays
        },

        mounted() {
         //   this.getPlantimes();


                var date = new Date(this.today);
                var day = date.getDay();
             //   var array = []
                for(var i=1;i<8;i++){
                    if(i-day!=0){
                    var days = i-day;
                    var newDate =   new Date(date.getYear()+(days * 24 * 60 * 60 * 1000));
                    this.arrayDays.push(newDate);
                    moment(String( newDate )).format('MM/DD/YYYY') // can replace format with format you want.
                    console.log(newDate);
                }
                    else
                    this.arrayDays.push(date);
                }

                this.arrayDays = newDate;

        },


        created() {
        const d = new Date();
        this.date = d.getDay();

        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1;
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();

        this.today = moment().format("YYYY-MM-DD");

         },

        methods: {
            countProcent(){
              var length = this.plantimesTime.length;
              let number = 0;
              for(let i = 0; i<length; i++){
                if(this.plantimesTime[i].last == this.today){
                  number = number + 1;
                }
              }

              this.procenta = Math.round((100*number)/length);
              this.series = [];
              this.series.push(this.procenta);
              console.log(number);

            },

         getPlantimes(){
            axios.get('/api/plantimes').then(response => {
                    this.plantimes = response.data;
                    this.plantimesTime = [];
                      for(let i=0; i<this.plantimes.length; i++){
                        if(this.plantimes[i].time == this.date){
                          this.plantimesTime.push(this.plantimes[i]);
                        }
            }

                console.log(this.plantimes);
                this.countProcent();
                })
             .catch(error => {
                console.log("404");
            });
            },
        },

    }
</script>

<style lang="scss" scoped>

</style>
