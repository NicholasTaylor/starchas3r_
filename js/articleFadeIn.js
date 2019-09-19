var fadeIn = document.getElementById('fadein-screen');
var bg = document.getElementById('bg-screen');

const fadeInitial = function(){
	return new Promise(function (resolve){
		fadeIn.style.backgroundColor = 'rgba(0,0,0,0.0)';
		resolve();
	});
}

const fadeBgScreen = function(){
	bg.style.backgroundColor = 'rgba(0,0,0,0.3)';
}

const fullFade = async function(){
	await fadeInitial();
	fadeIn.style.display = 'none';
	setTimeout(function(){
		fadeBgScreen();
	},1500);
}

document.addEventListener('DOMContentLoaded',function(){
	setTimeout(function(){
		fullFade();
	},500);
});