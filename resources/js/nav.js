let nav = document.querySelector('.nav_btn');
let navItem = document.querySelector('.mobile_nav_item');

nav.addEventListener('click', function(){
    navItem.classList.toggle('mobile-nav-active')
})