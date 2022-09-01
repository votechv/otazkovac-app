<template>
   <div class="plan">
    <div class="plan__info">
        <div class="plan__info-daypicker">
            <ul>
                <li v-for="item in sortpickarray" @click="getPlan()" :key="item.index" class="pick" :class="{ checkDay: date == item.value }"><input type="radio" v-model="date" :value="item.value" name="check-day"><label>{{item.name}}</label></li>
            </ul>
        </div>
        <div class="plan__info--buttons">
            <button class="user-home__category--mainButton" @click="openModal('add')"> <i class="fa-solid fa-plus"></i> Přidat </button>
            <button  class="user-home__category--mainButton" @click="openModal('edit')"><i class="fa-solid fa-marker"></i>Upravit</button>
        </div>
    </div>

        <div class="plan__app">

            <div class="plan__app--single" v-for="plan in plans" :key="plan.id">
                <div class="plan__app--icon">
                    <p>{{plan.emoji}}</p>
                </div>

                <div class="plan__app--content">
                    <h2>{{plan.name}}</h2>
                </div>

                <div @click="todayDone(plantime)" class="plan__app--done" >
                    <div class="plan__app--done--ico"><span v-if="date === todayDay"> 🔥 {{plan.count}} </span></div>
                </div>

                <div class="wrapper" v-if="false">
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

            <div class="plan__info-daypicker">

                {{sendDay}}
                <ul>
                    <li><input type="checkbox" v-model="day1" value="1" name="check-day"><label>Po</label></li>
                    <li><input type="checkbox" v-model="day2" value="2" name="check-day"><label>Út</label></li>
                    <li><input type="checkbox" v-model="day3" value="3" name="check-day"><label>St</label></li>
                    <li><input type="checkbox" v-model="day4" value="3" name="check-day"><label>Čt</label></li>
                    <li><input type="checkbox" v-model="day5" value="3" name="check-day"><label>Pá</label></li>
                    <li><input type="checkbox" v-model="day6" value="3" name="check-day"><label>So</label></li>
                    <li><input type="checkbox" v-model="day0" value="3" name="check-day"><label>Ne</label></li>
                </ul>
            </div>

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
    <button @click="sendHabit()"> <i class="fa-solid fa-floppy-disk"></i> Odeslat</button>
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
import {forEach} from "lodash";
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
               day0: false,
               everyday: false,
               user_id: '',
               plan_id: '',
               plantimesTime: [],
               today: '',
               todayDay :'',
               procenta: '',
               plans: [],
                error: '',
                sendDay: '',
               modalAllHab: false,
                indexsDays: [],
                daypick :'',
                pickarray:[
                    { name: 'Ne', value: 0, },
                    { name: 'Po', value: 1, },
                    { name: 'Út', value: 2, },
                    { name: 'St', value: 3, },
                    { name: 'Čt', value: 4, },
                    { name: 'Pá', value: 5, },
                    { name: 'So', value: 6, },
                ],
                sortpickarray:[],
        }
    },

      mounted() {
        this.getUser();
        this.getPlan();
        this.showDayPicker();
       this.reoder(this.pickarray, this.indexsDays, this.pickarray.length);
        console.log(this.getDayArray);
       },

      computed:{
        getDayArray(){
         const array =  [this.day0, this.day1, this.day2, this.day3, this.day4, this.day5, this.day6];
         const array2 = [];

            array.forEach((element, index) => {
               if(element == true){
                   array2.push(index);
               }else if(element == false){

               }else{
                   console.log("ERROR!!")
               }
            });

            const string1 = array2.join(",");

            return string1;
        },


      },

        components:{

        VueApexCharts, MainModal,EmojiPicker
        },

        created() {
        const d = new Date();
        this.date = d.getDay();
        this.todayDay = d.getDay();

        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1;
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();

        this.today = moment().format("YYYY-MM-DD");

        },


        methods:{
            getPlan(){
            axios.get('/api/plans').then(response => {
                this.plans = [];
                console.log(response.data);
                response.data.forEach((element, index) => {

                     const array = element.days.split(",");
                    const istoday = array.some((x) => x == this.date );
                    console.log(istoday);
                     if(istoday){
                        this.plans.push(element);
                     }

                });
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

            reoder(arr, index, n){
                const output = index.map(i => arr[i]);

                this.sortpickarray = output;
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

            showDayPicker(){
                var array = [];
                for(let i=1; i<8; i++){
                    var day = moment().add(i,'days').day();

                    array.push(day);
                }

                this.indexsDays = array;

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
                count: 0,
                days: this.getDayArray,
              }
                axios.post('./api/plans', data).then(response => {

                }
              );

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
