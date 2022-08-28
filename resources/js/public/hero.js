import gsap from 'gsap';


export default class Offline {
    constructor() {
      if (document.getElementById("offline-hero")) {
        this.initEvents();
      }
    }
  
    initEvents() {
        gsap.fromTo('.public-hero-svg', {x: 500}, {x:0, duration: 2})
    }

}