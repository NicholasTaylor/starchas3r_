var navIcon = document.getElementById('nav-icon');
var navIconFirstChild = navIcon.children[0];
var flagNav = false;
var body = document.getElementsByTagName('body')[0];
var html = document.getElementsByTagName('html')[0];
var navDiv = document.getElementById('container-nav-mobile');
var container = document.getElementById('container');

const navOn = function() {
	if (flagNav == false) {
		navDiv.style.left = '0vw';
		body.style.overflow = 'hidden';
		html.style.overflow = 'hidden';
		flagNav = true;
	}
}

const navOff = function() {
	if (flagNav == true) {
		body.style.overflow = 'initial';
		html.style.overflow = 'initial';
		navDiv.style.left = '-80vw';
		flagNav = false;
	}
}

navIconFirstChild.addEventListener('click', function(e) {
	e.preventDefault()
	navOn();
});

container.addEventListener('click', function(e) {
	e.preventDefault()
	navOff();
});