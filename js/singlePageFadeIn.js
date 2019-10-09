var fadeIn = document.getElementById('fadein-screen');
var bg = document.getElementById('bg-screen');

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