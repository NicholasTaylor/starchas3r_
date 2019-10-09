var navScreen =  document.getElementById('nav-screen');
var currentScroll = document.documentElement.scrollTop;
var currentVWHeight = window.innerHeight;
var flagHeader = false;

const navFade = function(){
	var currentScroll = document.documentElement.scrollTop;
	var currentVWHeight = window.innerHeight;
	if (currentScroll > 0 && flagHeader == false){
		navScreen.style.opacity = 1;
		navScreen.style.transition = '0.5s ease-in';
		flagHeader = true;
	} else if (currentScroll <= 0 && flagHeader == true){
		navScreen.style.opacity = 0;
		navScreen.style.transition = '0.5s ease-in';
		flagHeader = false;
	}
}

document.addEventListener('DOMContentLoaded',function(){
	navFade();
});

document.addEventListener('scroll',function(){
	navFade();
});

document.addEventListener('resize',function(){
	navFade();
});