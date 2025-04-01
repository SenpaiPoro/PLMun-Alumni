// BURGER NAV FUNCTION
const burger = document.querySelector(".burger");
const navMenu = document.querySelector(".nav-menu");

burger.addEventListener("click", ()=>{
    burger.classList.toggle("active");
    navMenu.classList.toggle("active");
});

// HIDE SHOW HEADER SCROLL
const header = document.querySelector(".header");
let lastScrollTop = 0;

window.addEventListener("scroll", ()=>{
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if(scrollTop > lastScrollTop){
        header.style.top = "-100px";
    }
    else{
        header.style.top = "0";
    }
    lastScrollTop = scrollTop;
})