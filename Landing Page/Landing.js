const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");
var num = 2;
navToggle.addEventListener("click", ()=>{
    //navMenu.classList.toggle("nav-menu_visible");
    
    if(num == 1){
        toggle(2);
        num = 2;
        return;
    }
    if(num == 2){
        toggle(1);
        num = 1;
        return;
    }
});

function toggle(num){
    if(num == 1){
        document.getElementById("navList").style = "display: flex";
        document.getElementById("SpBtns").style = "height: 80px";
        document.getElementById("regSpBtns").style = "height: 80px";
        document.getElementById("iBars").classList.add("moveBars");
        document.getElementById("iBars").classList.remove("resetBars");
        //document.getElementById("bars").style = "display: none";
        //alert("block");
    }

    if(num == 2){
        document.getElementById("navList").style = "display: none";
        document.getElementsByClassName("SpBtns").style = "height: 80px";
        document.getElementById("regSpBtns").style = "height: 80px";
        document.getElementById("iBars").classList.add("resetBars");
        document.getElementById("iBars").classList.remove("moveBars");
        //document.getElementById("bars").style = "display: block";
        //alert("none");
    }
}

$(window).on("load",function checkPosition(){
    if($(window).width() > 843)
    {
        document.getElementById("navList").removeAttribute("style");
    }
});