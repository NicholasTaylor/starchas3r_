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

const vhReset = function(){
	let vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty('--vh', +vh +'px');
} 

document.addEventListener('DOMContentLoaded',function(){
	navFade();
	vhReset();
});

document.addEventListener('scroll',function(){
	navFade();
});

window.addEventListener('resize',function(){
	navFade();
	vhReset();
});