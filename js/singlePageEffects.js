var fadeIn = document.getElementById('fadein-screen');
var bg = document.getElementById('bg-screen');
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

const fadeInitial = function(){
	return new Promise(function (resolve){
		fadeIn.style.opacity = 0.0;
		setTimeout(function(){
			resolve();
		},500);
	});
}

const fadeBgScreen = function(){
	bg.style.opacity = 0.3;
}

const fullFade = async function(){
	await fadeInitial();
	fadeIn.style.display = 'none';
	setTimeout(function(){
		fadeBgScreen();
	},250);
}

document.addEventListener('DOMContentLoaded',function(){
	navFade();
	setTimeout(function(){
		fullFade();
	},500);
});

document.addEventListener('scroll',function(){
	navFade();
});

document.addEventListener('resize',function(){
	navFade();
});