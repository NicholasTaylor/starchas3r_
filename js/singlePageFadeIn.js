var bg = document.getElementById('bg-screen');
var titleContent = document.getElementById('title-content');
var containerNav = document.getElementById('container-nav');
var navIcon = document.getElementById('nav-icon');

const fadeInitial = function(){
	return new Promise(function (resolve){
		bg.style.opacity = 0.3;
		setTimeout(function(){
			resolve();
		},500);
	});
}

const fadeInText = function(){
	titleContent.style.opacity = 1;
	containerNav.style.opacity = 1;
	navIcon.style.opacity = 1;
}

const fullFade = async function(){
	await fadeInitial();
	bg.style.transition = '0s';
	setTimeout(function(){
		fadeInText();
	},250);
}

document.addEventListener('DOMContentLoaded',function(){
	setTimeout(function(){
		fullFade();
	},500);
});