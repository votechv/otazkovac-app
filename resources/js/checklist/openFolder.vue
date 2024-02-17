<template>
    <div class="checklist">
        <div class="checklist__top">
            <div class="checklist__top-info">
                <h2> <span><i class="fa-solid fa-angle-left"></i> </span> 31. srpen <span> <i class="fa-solid fa-angle-right"></i></span> </h2>
            </div>
            <div class="checklist__top-calendar">
                <h2 @click="openCalendar()"> <i class="fa-solid fa-calendar-days"></i></h2>
                <date-picker  v-model='selectedDate' v-if="calendarOpen"/>
            </div>

        </div>

        <div class="checklist__buttons">
            <button v-if="page==1" @click="page = 2"class="user-home__category--mainButton"><i class="fa-solid fa-eye"></i> Vypast </button>
            <button v-if="page==2" @click="page = 1" class="user-home__category--mainButton"><i class="fa-solid fa-eye"></i> Rozložení </button>
            <button @click="modalCreate = true" class="user-home__category--mainButton"><i class="fa-solid fa-plus"></i> Zapsat </button>
        </div>

        <template v-if="page == 1">
            <div class="checklist__app">
                <div class="checklist__app-single checklist__app-single--green">
                    <p> Dodělat v Pobo copywriting </p>

                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single checklist__app-single--red">
                    <p> Zajet si pro novou občanku </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single checklist__app-single--orange checklist__app-single--done">
                    <p> Jít se psem na procházku </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single checklist__app-single--orange" >
                    <p> Dodělat custom úpravy pro 4 premium klienty</p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single checklist__app-single--green">
                    <p> Zbytek dne se věnovat psovi </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 6 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 7 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 8 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 9 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 10 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Čauky mňauky úkol číslo 11 :) </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 12 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 13 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 14 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>
                <div class="checklist__app-single">
                    <p> Ahooojky 15 </p>
                    <div class="checklist__app-single--time">15:00</div>
                </div>

            </div>
        </template>

        <template v-if="page ==2">
            <div class="checklist__table">
                <table>
                    <thead>
                    <tr>
                        <th>Datum </th>
                        <th>Událost / Úkol </th>
                        <th>Čas</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>12.9.</td>
                        <td>Předpříprava v Plzni na VŠ</td>
                        <td>14:30</td>
                        <td class="checklist__table--edit">  <i class="fa-solid fa-pen"></i>  <i class="fa-solid fa-trash-can"></i></td>
                    </tr>
                    <tr>
                        <td>13.9.</td>
                        <td>Předpříprava v Plzni na VŠ</td>
                        <td> 23:00 </td>
                        <td class="checklist__table--edit">  <i class="fa-solid fa-pen"></i>  <i class="fa-solid fa-trash-can"></i></td>
                    </tr>
                    <tr class="checklist__table--event">
                        <td>19.9.</td>
                        <td>Zahájení studia na VŠ</td>
                        <td>8:00</td>
                        <td class="checklist__table--edit">  <i class="fa-solid fa-pen"></i>  <i class="fa-solid fa-trash-can"></i></td>
                    </tr>
                    <tr>
                        <td>23.9</td>
                        <td>Domča starosta volba</td>
                        <td>14:00</td>
                        <td class="checklist__table--edit">  <i class="fa-solid fa-pen"></i>  <i class="fa-solid fa-trash-can"></i></td>

                    </tr>
                    <tr class="checklist__table--event">
                        <td>31.10</td>
                        <td>Moje narozeniny</td>
                        <td>0:00</td>
                        <td class="checklist__table--edit">  <i class="fa-solid fa-pen"></i>  <i class="fa-solid fa-trash-can"></i></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </template>

        <main-modal title="Zapsat" v-if="modalCreate" @close="modalCreate = false">
            <template v-slot:content>
                <div class="checklist__modal">
                    <form>
                        <div class="btn-group btn-toggle">
                            <button class="btn btn-bg btn-primary btn-default" style="border: 1px solid gray">Úkol</button>
                            <button class="btn btn-bg active" style="border: 1px solid gray">Událost</button>
                        </div>

                        <input type="text" name="newName" class="checklist__modal--big" v-model="newName" placeholder="Úkol: Např. odpovědět na emaily">
                        <label name="dulezitost"> Důležitost </label>
                        <div class="checklist__modal-colors">
                            <div class="checklist__modal-colors-single">
                                <input type="radio" name="dulezitost" id="dulezitost1"value="1">
                                <label class="form-check-label" for="dulezitost1">Malá</label>
                            </div>
                            <div class="checklist__modal-colors-single">
                                <input type="radio" name="dulezitost" id="dulezitost2"value="2">
                                <label class="form-check-label" for="dulezitost2">Střední</label>
                            </div>
                            <div class="checklist__modal-colors-single">
                                <input type="radio" name="dulezitost" id="dulezitost3"value="3">
                                <label class="form-check-label" for="dulezitost3">Velká</label>
                            </div>
                        </div>
                        <date-picker  v-model='newDate' style="position: relative"/>
                        <input type="time" value="12:00">

                        <button class="checklist__modal-send"><i class="fa-solid fa-floppy-disk"></i> Odeslat</button>
                    </form>
                </div>
            </template>
        </main-modal>
    </div>
</template>

<script>

import Calendar from 'v-calendar/lib/components/calendar.umd'
import DatePicker from 'v-calendar/lib/components/date-picker.umd'
import MainModal from '../components/MainModal.vue'

export default {
    data() {
        return {
            selectedDate: '',
            calendarOpen: false,
            page: 1,
            newDate: '',
            modalCreate: false,
        }
    },

    mounted() {
        this.selectedDate = new Date();
    },

    components:{
        Calendar,
        DatePicker, MainModal
    },
    methods: {
        openCalendar(){
            if(this.calendarOpen){
                this.calendarOpen = false;
            }else{
                this.calendarOpen = true;
            }

        },
    },
}
</script>

<style lang="scss" scoped>

</style>
