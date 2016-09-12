/* Mobile view init */
var navBarLi = document.querySelectorAll('.navbar li');
var navbarTotalWidth = 0;
for(var i = 1; i < navBarLi.length; i++) {
    navbarTotalWidth = navbarTotalWidth + $(navBarLi[i]).width();
}
var mobileView = $(document).width() < navbarTotalWidth;
/* Navigation bar stick init */
var navStick = false;
/* Stick navigation bar to top on scrolling */
var navStickScroll = function () {
    if(document.body.scrollTop > parseInt($('.header').height())) {
        document.querySelector('.navbar').style.position = 'fixed';
        document.querySelector('.navbar').style.top = '0';
        document.querySelector('#flogo').style.display = 'block';
        navStick = true;
    }
    else {
        document.querySelector('.navbar').style.position = null;
        document.querySelector('.navbar').style.top = null;
        document.querySelector('#flogo').style.display = 'none';
        navStick = false;
    }
};
if(!mobileView) { document.onscroll = navStickScroll; }
/* Make navigation bar links float vertically to fit contents if mobileView*/
var navFloatMobile = function () {
    if(mobileView) {
        var li = document.querySelectorAll('.navbar li');
        for(var i = 0; i < li.length; i++) {
            li[i].style.float = 'none';
        }
        document.querySelector('#togglemenu').style.display = 'block';
    }
};
navFloatMobile();
/* Navigation bar menu toggle button */
var menuView = false;
var hideMenu = function () {
    var navBar = document.querySelector('.navbar ul');
    navBar.style.minWidth = null;
    navBar.style.minHeight = null;
    navBar.style.position = null;
    navBar.style.top = null;
    document.querySelector('#flogo').style.display = 'none';
    document.querySelector('.navbar').style.display = 'block';
//    $('.navbar').fadeIn();
    
    var li = document.querySelectorAll('.navbar li');
    for(var i = 2; i < li.length; i++) {
        li[i].style.display = 'none';
    }
    menuView = false;
};
var showMenu = function () {
    var navBar = document.querySelector('.navbar ul');
//    navBar.style.minWidth = '100vw';
    navBar.style.minHeight = '100vh';
    navBar.style.position = 'fixed';
    navBar.style.top = 0;
    document.querySelector('#flogo').style.display = 'block';
    document.querySelector('.navbar').style.display = 'none';
    $('.navbar').fadeIn();
    var li = document.querySelectorAll('.navbar li');
    for(var i = 2; i < li.length; i++) {
        li[i].style.display = 'block';
    }
    menuView = true;
};
if(mobileView) {
    hideMenu();
}
document.querySelector('a#menubutton').onclick = function () {
    if(menuView) {
        document.querySelector('a#menubutton').innerHTML = '&equiv;';
        hideMenu();
    }
    else {
        document.querySelector('a#menubutton').innerHTML = '<small>x</small>';
        showMenu();
    }
};
