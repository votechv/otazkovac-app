import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import { duration } from 'moment';
gsap.registerPlugin(ScrollTrigger);
export default class Offline {
    constructor() {
      if (document.getElementById("offline")) {
        this.initEvents();
      }
    }
  
    initEvents() {

        var tl = gsap.timeline({ duration: 1});
        setTimeout(() => {
            tl.to('.homepage__main-title--bg', {width: '100%'});
            tl.to('.homepage__main-subtitle--bg', {width: '100%'});
            tl.to('.homepage__main--bg', {width: '100%', duration: 2});
            tl.to('.homepage__main-title', {color: '#24695c'}, 2);
        }, 1700);

  
        gsap.to('.homepage-arrow',{y:17, yoyo: true, repeat: -1, duration: 1});
    
        for(var i = 1; i<5; i++){
          gsap.fromTo("#homepage-content-"+ i + "", { 
              opacity: 0,
              y: 200,
              x: 500,
            },{
                opacity: 1,
                y: 0,
                x: 0,
                scrollTrigger: "#homepage-content-"+ i + "",
                duration: 2,
            });
        }

        for(var ia = 1; ia<4; ia++){
          gsap.fromTo("#homepage-citation-"+ ia + "", { 
              opacity: 0,
              y: 300, 
              scale: 0
            },{
                opacity: 1,
                y: 0,
                scrollTrigger: "#homepage-citation-"+ ia + "",
                duration: 1.5,
                scale: 1
            });
        }

     

          gsap.to(".homepage__banner--title", 30, { backgroundPosition: "-960px 0", repeat: -1 });
          
    
    }

}