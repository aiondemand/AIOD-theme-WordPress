/**
 * Custom javascript code from ubizzium
 */

var simulateClick = function (elem) {
	// Create our event (with options)
	var evt = new MouseEvent('click', {
		bubbles: true,
		cancelable: true,
		view: window
	});
	// If cancelled, don't dispatch our event
	var canceled = !elem.dispatchEvent(evt);
};

document.addEventListener('DOMContentLoaded', function()
{
	initSearchModalFn();
	initVideoModalFn();
	initNewsletter();

	if ( (ubHasClass(document.querySelector('body'), 'home')) && (window.innerWidth > 576) )
	{
		initHomepageScrollAnim();
	}
});


// Fixed Header
let header = document.querySelector('.header');
document.addEventListener('scroll', function (event) {
	const windowScroll = window.scrollY;
	if (windowScroll > 1) {
		header.classList.add("fixed");
	} else {
		header.classList.remove("fixed");
	}
});

//Menu mobile
var menuWrapper = document.querySelector('.menu-global-wrapper');
var menuTrigger = document.querySelector('.mobile-menu-trigger');
var menuTriggerClass = 'menu-global-wrapper--show';
var menu = document.querySelector('.header');
var docBody = document.querySelector('body');
var docHtml = document.querySelector('html');

menuTrigger.addEventListener('click', function(e){

	if (window.innerWidth <= 576)
	{
		// close search layer
		ubRemoveClass(document.querySelector('body'), 'hasSearchOpen');
		ubRemoveClass(document.querySelector('body'), 'modal-open');
		ubRemoveClass(document.querySelector('.modal-search'), 'show');
		document.querySelector('.modal-search').style.display = 'none';
		var ubModalBackdrop = document.querySelector('.modal-backdrop')
		if (ubModalBackdrop)
		{
			ubRemoveClass(ubModalBackdrop, 'show');
			ubModalBackdrop.parentNode.removeChild(ubModalBackdrop);
		}
	}

	menu.classList.toggle("mobile-opened");
	menuWrapper.classList.toggle(menuTriggerClass);
	menuTrigger.classList.toggle("open");
	docHtml.classList.toggle('in-modal');
	docBody.classList.toggle('in-modal');
	docBody.classList.toggle('in-modal-menu');
});

var submenuBtns = document.querySelectorAll('.header__menu li .has-submenu');

for (var i = 0; i < submenuBtns.length; i++) {
	var submenuBtn = submenuBtns[i];
	submenuBtn.addEventListener('click', function(){
		console.log(this.nextElementSibling)
		if ( !this.nextElementSibling.classList.contains('header__menu__submenu--open') ) {
			for (let x = 0; x < submenuBtns.length; x++) {
				submenuBtns[x].nextElementSibling.classList.remove('header__menu__submenu--open');
			}
		}
		this.nextElementSibling.classList.toggle('header__menu__submenu--open');
		this.classList.toggle('has-submenu__active');
	});
}

//  only in MOBILE
/*function checkIfMobile() {return false;} // hacked function, remove/fix after go live
if (!checkIfMobile()) {
	console.log("Desktop Device");

	//  show submenu
	openSubMenu.forEach(function (subMenuSelected) {
		subMenuSelected.addEventListener('mouseover', function (event) {
			let elements = subMenuSelected.querySelectorAll(".hoverAnimation");
			elements.forEach(function (element) {
				if (!element.classList.contains('animated')) {
					element.classList.add('animated', 'flipInX');
				}
			});
		});
	});

	//  hide submenu
	openSubMenu.forEach(function (subMenuSelected) {
		subMenuSelected.addEventListener('mouseout', function (event) {
			let elements = subMenuSelected.querySelectorAll(".hoverAnimation");
			elements.forEach(function (element) {
				element.classList.remove('animated', 'flipInX');
			});
		});
	});

} else {
	console.log("Mobile Device");

	//  show submenu MOBILE
	showSubmenuMobileFunctionality();

	//  close submenu MOBILE
	closeSubmenu();

}


//  show submenu MOBILE
function showSubmenuMobileFunctionality() {
	openSubMenu.forEach(function (subMenuSelected) {
		subMenuSelected.addEventListener('click', function (event) {

			//  change status of submenu open button to opened
			this.setAttribute("data-status", "opened");

			//  slide main menu back to original position
			document.getElementById('main-menu').classList.add("slided");

			//  slide left window width
			document.getElementById('main-menu').style.left = "-" + windowWidth + "px";

			event.stopPropagation();
		});
	});
}*/

//  close submenu MOBILE
function closeSubmenu() {
	let subMenuBackButton = document.querySelectorAll(".close-submenu");
	subMenuBackButton.forEach(function (button) {
		button.addEventListener('click', function (event) {

			//  slide main menu back to original position
			document.getElementById('main-menu').classList.remove("slided");

			//  remove style from main menu
			document.getElementById('main-menu').removeAttribute("style");

			//  change status of submenu open button to closed after slide "main-menu"
			setTimeout(() => {
				this.closest(".with-submenu").setAttribute("data-status", "closed");
			}, 750);

			event.stopPropagation();
		});
	});
}

function initSearchModalFn()
{
	var elBody = document.querySelector('body');

	document.querySelector('.search-trigger-button').addEventListener('click', function(){
		if (window.innerWidth <= 576)
		{
			var menuTrigger = document.querySelector('.mobile-menu-trigger');
			simulateClick(menuTrigger);
		}

		ubAddClass(elBody, 'hasSearchOpen');
	});

	document.getElementById('searchModal').addEventListener('click', function(e){
		console.log(e.target);
		console.log(this);
		if (e.target === this)
		{
			ubRemoveClass(elBody, 'hasSearchOpen');
		}
	});
}

function initVideoModalFn()
{
	var modalContainer = document.querySelector('.modal-video');

	if (modalContainer !== null)
	{
		if (document.querySelector('.video-trigger-button') !== null)
		{
			document.querySelector('.video-trigger-button').addEventListener('click', function(){
				document.querySelector('.modal-video-content').innerHTML = modalContainer.dataset.videocode;
			});
		}

		if (modalContainer.querySelector('.close') !== null)
		{
			modalContainer.querySelector('.close').addEventListener('click', function(){
				document.querySelector('.modal-video-content').innerHTML = '';
			});
		}
	}
}

function initNewsletter()
{
	var elBody = document.querySelector('body');

	if ( document.querySelector('#triggerNewsletter') !== null )
	{
		document.querySelector('#triggerNewsletter').addEventListener('click', function(event){
			document.getElementById('contentNewsletter').classList.add('is-active');
		});

		document.querySelector('#btn-close-newsletter').addEventListener('click', function(event){
			document.getElementById('contentNewsletter').classList.remove('is-active');
		});
	}	
}

function ubHasClass(el, className) {
	return el.classList ? el.classList.contains(className) : new RegExp('\\b'+ className+'\\b').test(el.className);
}

function ubAddClass(el, className) {
	if (el.classList) el.classList.add(className);
	else if (!ubHasClass(el, className)) el.className += ' ' + className;
}

function ubRemoveClass(el, className) {
	if (el.classList) el.classList.remove(className);
	else el.className = el.className.replace(new RegExp('\\b'+ className+'\\b', 'g'), '');
}

/* HOMEPAGE SCROLL ANIMATIONS */
function initHomepageScrollAnim()
{
	//return true;
	console.log('INIT ANIMATE SCROLL FN');

	// init controller
	var controller = new ScrollMagic.Controller({
		addIndicators: false,
	});

	var scene1 = new ScrollMagic.Scene({
			triggerElement: ".ubAnim_fixContainer",
			duration: (window.innerHeight * 3),
			triggerHook: 0
		})
		.setPin('.ubAnim_fixContainer')
		.addTo(controller)

	// Scroll image to center
	var scene2 = new ScrollMagic.Scene({
			duration: (window.innerHeight),
			offset: 0,
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setTween('.ubAnim_scrollUpDiv', {translateY: 0})
		.addTo(controller); // assign the scene to the controller

	// scale image to fullwidth
	var scene3 = new ScrollMagic.Scene({
			duration: (window.innerHeight / 2),
			offset: (window.innerHeight),
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setTween('.ubAnim_scaleUpImg', {scale: 1})
		.addTo(controller); // assign the scene to the controller

	// Overlay Opacity
	var scene4 = new ScrollMagic.Scene({
			duration: (window.innerHeight * 0.25),
			offset: (window.innerHeight * 1.5),
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setTween('.ubAnim_fadeIn1', {opacity: 1})
		.addTo(controller); // assign the scene to the controller

	// Play Opacity
	var scene4 = new ScrollMagic.Scene({
			duration: (window.innerHeight * 0.25),
			offset: (window.innerHeight * 1.75),
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setTween('.ubAnim_fadeIn2', {opacity: 1})
		.addTo(controller); // assign the scene to the controller

	// Label Opacity
	var scene5 = new ScrollMagic.Scene({
			duration: (window.innerHeight * 0.25),
			offset: (window.innerHeight * 2),
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setTween('.ubAnim_fadeIn3', {opacity: 1})
		.addTo(controller); // assign the scene to the controller

	// Add video Trigger
	var scene5b = new ScrollMagic.Scene({
			duration: (window.innerHeight * 4),
			offset: (window.innerHeight * 2),
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setClassToggle(".video-trigger-button", "video-trigger-active")
		.addTo(controller); // assign the scene to the controller

	// Header Background
	var scene6 = new ScrollMagic.Scene({
			offset: ( (window.innerHeight * 4) - document.querySelector('.header--home').offsetHeight ),
			triggerElement: ".ubAnim_fixContainer",
			triggerHook: 0
		})
		.setClassToggle(".header--home", "homeHeaderAfterAnimation") // add class toggle
		.addTo(controller); // assign the scene to the controller

}

/* END HOMEPAGE SCROLL ANIMATIONS */
