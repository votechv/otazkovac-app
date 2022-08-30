<template>
   <div class="plan">

    <div class="plan__info">
        <div class="plan__info--head">
             <h2> Dnes máte v plánu:  {{date}}</h2>
        </div>
        <div class="plan__info--buttons">
            <button class="user-home__category--mainButton" @click="openModal('add')"> <i class="fa-solid fa-plus"></i> Přidat </button>
            <button  class="user-home__category--mainButton" @click="openModal('edit')"><i class="fa-solid fa-marker"></i>Upravit</button>
        </div>
    </div>


  <div id="card">
        <div id="chart">
        <apexchart  type="radialBar" height="300" :options="chartOptions" :series="series"></apexchart>
      </div>
      </div>
        <div class="plan__app">
            <div class="plan__app--single" v-for="plantime in plantimesTime" :key="plantime.id">
                <div class="plan__app--icon">
                    <p>{{plantime.plan.emoji}}</p>
                </div>

                <div class="plan__app--content">
                    <span class="plan__app--minutes">{{plantime.plan.time}} minut</span>
                    <h2>{{plantime.plan.name}}</h2>
                </div>

                <div @click="todayDone(plantime)" class="plan__app--done" v-if="plantime.last !== today">
                    <div class="plan__app--done--ico">{{plantime.plan.count}}</div>
                </div>

                <div class="wrapper" v-if="plantime.last == today">
                  <svg class="approve_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="approve_icon_circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="approve_icon_check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                  </svg>
                </div>

              </div>

            </div>




<MainModal title="Nový návik" @close="closeModal('add')" v-if="mainModal">
        <template v-slot:content>

        <div class="createHabit">

                <input type="text" name="newName" v-model="newName" placeholder="Návyk: Např. učit se španělsky">
                <input type="text" name="newTime" v-model="newTime" placeholder="Kolik minut denně? Např. 15">


                  <ul class="day-picker">

                    <li><input v-model="day1" type="checkbox"><label class='ui-input'>Po</label></li>
                    <li><input v-model="day2" type="checkbox"><label class='ui-input'>Út</label></li>
                    <li><input v-model="day3" type="checkbox"><label class='ui-input'>St</label></li>
                    <li><input v-model="day4" type="checkbox"><label class='ui-input'>Čt</label></li>
                    <li><input v-model="day5" type="checkbox"><label class='ui-input'>Pá</label></li>
                    <li><input v-model="day6" type="checkbox"><label class='ui-input'>So</label></li>
                    <li><input v-model="day7" type="checkbox"><label class='ui-input'>Ne</label></li>
                  </ul>

               <emoji-picker @emoji="append">



      <div
        class=""
        slot="emoji-invoker"
        slot-scope="{ events: { click: clickEvent } }"
        @click.stop="clickEvent"
      >
        <input slot="emoji-invoker"  @click.stop="clickEvent" class="emoji-input" disabled="disabled"  v-model="newEmoji" placeholder="👆 Vyber emoji...">
      </div>
      <div slot="emoji-picker" slot-scope="{ emojis, insert, display }">
        <div class="emoji-picker" :style="{ top: display.y + 'px', left: display.x + 'px' }">

          <div>
            <h5> Vlajky států </h5>
          <span class="cursor-poninter" @click="insert('🇨🇿')"> 🇨🇿 </span>
          <span class="cursor-poninter" @click="insert('🇬🇧')"> 🇬🇧 </span>
          <span class="cursor-poninter" @click="insert('🇺🇲')"> 🇺🇲 </span>
          <span class="cursor-poninter" @click="insert('🇩🇪')"> 🇩🇪 </span>
          <span class="cursor-poninter" @click="insert('🇪🇸')"> 🇪🇸 </span>
          <span class="cursor-poninter" @click="insert('🇺🇦')"> 🇺🇦 </span>
          <span class="cursor-poninter" @click="insert('🇩🇰')"> 🇩🇰 </span>
          <span class="cursor-poninter" @click="insert('🇵🇱')"> 🇵🇱 </span>
          <span class="cursor-poninter" @click="insert('🇨🇳')"> 🇨🇳 </span>
          <span class="cursor-poninter" @click="insert('🇫🇷')"> 🇫🇷 </span>
          <span class="cursor-poninter" @click="insert('🇸🇪')"> 🇸🇪 </span>
          <span class="cursor-poninter" @click="insert('🇦🇪')"> 🇦🇪 </span>
          <span class="cursor-poninter" @click="insert('🇯🇵')"> 🇯🇵 </span>
          <span class="cursor-poninter" @click="insert('🇺🇦🇷🇺')"> 🇷🇺 </span>
           <h5> Nejpoužívanější</h5>
            <div v-for="(emojiGroup, category) in emojis" :key="category">



              <div class="emojis">
                <span

                  v-for="(emoji, emojiName) in emojiGroup"
                  :key="emojiName"
                  @click="insert(emoji)"
                  :title="emojiName"
                >{{ emoji }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </emoji-picker>

    <div v-if="error" class="alert alert-danger" role="alert">
      Varovnání
    </div>
    <button @click="sendHabit()"> Odeslat</button>
    </div>
  </template>
</MainModal>


<MainModal v-if="modalAllHab" title="Všechny náviky" @close="closeModal('edit')">
  <template v-slot:content>
    <div class="modalAllHabits">
          <div class="plan__app">
            <div class="plan__app--single" v-for="plan in plans" :key="plan.id">
                <div class="plan__app--icon">
                    <p>{{plan.emoji}}</p>
                </div>

                <div class="plan__app--content">
                    <span class="plan__app--minutes">{{plan.time}} minut</span>
                    <h2>{{plan.name}}</h2>
                </div>

                   <i @click="deleteHabit(plan.id)" class="fa-solid fa-trash"></i>
              </div>
            </div>
      </div>
  </template>
</MainModal>


     <!-- <pre> {{user}}</pre> -->
   </div>
</template>

<script>
import VueApexCharts from 'vue-apexcharts'
import MainModal from '../components/MainModal'
import EmojiPicker from 'vue-emoji-picker'
import gsap from 'gsap'
import moment from 'moment'
    export default {
        data() {
            return {
               plans: '',
               plantimes: '',
               date: '',
               mainModal: false,
               newName: '',
               newTime: '',
               newEmoji: '',
               days: [''],
               day1: false,
               day2: false,
               day3: false,
               day4: false,
               day5: false,
               day6: false,
               day7: false,
               everyday: false,
               user_id: '',
               plan_id: '',
               plantimesTime: [],
               today: '',
               procenta: '',
               plans: '',
               modalAllHab: false,

            series: [0],
          chartOptions: {
           colors:['#80d100'],
            chart: {
              height: 350,
              type: 'radialBar',
              offsetY: -10,

                animations: {
                  enabled: true,
                  easing: 'easeinout',
                  speed: 1200,
                  animateGradually: {
                      enabled: true,
                      delay: 150
                  },
                  dynamicAnimation: {
                      enabled: true,
                      speed: 350
                  }
              }

            },

            plotOptions: {
              radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                  value: {
                    offsetY: 76,
                    fontSize: '36px',
                    color: undefined,
                    formatter: function (val) {
                      return val + "%";
                    }
                  },

                }
              }
            },

            stroke: {
              dashArray: 4
            },
            labels: [''],
          },


        }
    },

      mounted() {
        this.getUser();
    //    this.getPlantimes();
        this.getPlan();
      },

      computed:{
        getDayArray(){
          return [this.day7, this.day1, this.day2, this.day3, this.day4, this.day5, this.day6]
        },
      },

        components:{

        VueApexCharts, MainModal,EmojiPicker
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


        methods:{

            getPlantimes(){
            axios.get('/api/plantimes').then(response => {
                    this.plantimes = response.data;
                      this.countProcent();
                })
             .catch(error => {
                console.log("404");
            });
            },
            getPlan(){
            axios.get('/api/plans').then(response => {
                    this.plans = response.data;
                })
             .catch(error => {
                console.log("404");
            });
            },

            openModal(info){
                if(info == 'add'){
                  this.mainModal = true;
                }else if(info == 'edit'){
                  this.modalAllHab = true;
                }else{

                }
            },

            closeModal(info){
                if(info == 'add'){
                  this.mainModal = false;
                }else if(info == 'edit'){
                  this.modalAllHab = false;
                }else{

                }
            },

            taskDone(){
                // DODĚLAT GSAP ANIMACI
            },

            selectAll(){
              if(this.everyday = true){
              this.pondeli = true;
              this.utery = true;
              this.streda = true;
              this.ctvrtek = true;
              this.patek = true;
              this.sobota = true;
              this.nedele = true;
              }
              else{

              }

            },


                append(emoji) {
                if(this.newEmoji != ''){
                    this.newEmoji = '';
                    this.newEmoji += emoji;
                }else{

                    this.newEmoji += emoji
                }
            },

            getUser(){
                axios.get('./api/users', ).then(response => {

                this.user_id = response.data.id

                console.log(this.user_id);
                console.log(response.data);
            });
            },

            sendHabit(){
              let data = {
                user_id: this.user_id,
                name: this.newName,
                emoji: this.newEmoji,
                time: this.newTime,
                count: 0,
              }


                axios.post('./api/plans', data).then(response => {

                      for(let i = 0; i<8; i++){
                        if(this.getDayArray[i] == true){
                         console.log("čau");
                          let datatimes = {
                            user_id: this.user_id,
                            plan_id: response.data.id.id,
                            time: i,

                          }

                          axios.post('./api/plantimes', datatimes).then(response => {
                              console.log(datatimes);
                              this.getPlantimes();
                              this.mainModal = false;
                          });
                        }


                      }




              });

            },

            todayDone(plantime){
              var plantime_id = plantime.id;
              var plantime_plan_id = plantime.plan.id;

              var newCount = plantime.plan.count + 1;

              let dataPlans = {
                count: newCount
              }

              axios.patch('/api/plans/'+plantime_plan_id, dataPlans).then(response => {
                      this.getPlantimes();
              });;

              let dataPlanTime = {
                last: this.today
              }

               axios.patch('/api/plantimes/'+plantime_id, dataPlanTime).then(response => {
                    this.getPlantimes();
              });;

              console.log(this.today);
            },

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

            },

            deleteHabit(planid){
               axios.delete('/api/plans/' + planid).then(response => {
                    this.getPlan();
                    this.getPlantimes();
                 });
            }

              },



            }


</script>
