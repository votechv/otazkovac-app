export default class Offline {
    constructor() {
      if (document.getElementById("offline-nav")) {
        this.initEvents();
      }
    }
  
    initEvents() {
        const burger = document.querySelector('.offline-ham');
        const ul = document.querySelector('.offline-nav__content-ul');

        burger.addEventListener('click', ()=>{
          ul.classList.toggle('dis-flex');
        })
    }

}