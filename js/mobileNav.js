var navIcon = document.getElementById('nav-icon');
var navIconFirstChild = navIcon.children[0];
var flagNav = false;
var body = document.getElementsByTagName('body')[0];
var navDiv = document.getElementById('container-nav-mobile');
var container = document.getElementById('container');
console.log(navDiv);

const navOn = function() {
	console.log('navOn starting. flagNav status is ' +flagNav);
	if (flagNav == false) {
		body.style.left = '80vw';
		navDiv.style.left = '0vw';
		flagNav = true;
	}
	console.log('navOn ended. flagNav status is ' +flagNav);
}

const navOff = function() {
	console.log('navOff starting. flagNav status is ' +flagNav);
	if (flagNav == true) {
		navDiv.style.left = '-80vw';
		body.style.left = '0vw';
		flagNav = false;
	}
	console.log('navOff ended. flagNav status is ' +flagNav);
}

navIconFirstChild.onclick = navOn;
container.onclick = navOff;