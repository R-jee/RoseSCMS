/*
 ================================
 Author: Araf Karim (@arafkarim)
 Template: Documentation Template
 Version: 1.0
 ================================
*/

/* topnav */
function myFunction(){
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

$(window).scroll(function(){
  if($(this).scrollTop()>20){
    $('.topnav').addClass('hideTopnav');
    /*$('.main-container').css('margin-top', '148px');*/
  } else{
    $('.topnav').removeClass('hideTopnav');
    /*$('.main-container').css('margin-top', '111px');*/
  }
});

/* accordian */
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
