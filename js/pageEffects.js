var navParent =  document.getElementById('container-nav');
var currentScroll = document.documentElement.scrollTop;
var currentVWHeight = window.innerHeight;
var flagHeader = false;

const navFade = function(){
	var currentScroll = document.documentElement.scrollTop;
	var currentVWHeight = window.innerHeight;
	if (currentScroll > 0 && flagHeader == false){
		navParent.style.backgroundColor = 'rgba(0,0,0,1)';
		flagHeader = true;
	} else if (currentScroll <= 0 && flagHeader == true){
		navParent.style.backgroundColor = 'rgba(0,0,0,0)';
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