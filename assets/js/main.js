import {
	closeRGPD,
	cookiesListener,
	customFileInput,
	customSelect,
	listenerKeyUpForm,
	listenerRGPD,
	openRGPD,
	validateForm,

	teste
} from "./functions";

// import {setup, draw } from "./sketch";

import "bootstrap/js/dist/modal";
import "bootstrap/js/dist/carousel";
import AOS from 'aos';

// import "gsap/all";
import { gsap, ScrollTrigger} from "../../node_modules/gsap/all";
gsap.registerPlugin(ScrollTrigger);

import { tns } from "../../node_modules/tiny-slider/src/tiny-slider";


// import "p5/lib/p5";
// import "p5/lib/addons/p5.sound";

// jQuery document.ready equivalent - faster
document.addEventListener("DOMContentLoaded", function () {

	// ES6 example syntax
	const some = () => {
		console.log("Developed by LOBA.cx - https://www.loba.pt/");
	};

	some();

	/**
	|--------------------------------------------------
	| RGPD
	|--------------------------------------------------
	*/
	listenerRGPD(".rgpd");
	openRGPD(".open-rgpd");
	closeRGPD(".reject-rgpd");

	/**
	|--------------------------------------------------
	| COOKIES
	|--------------------------------------------------
	*/
	cookiesListener(
		".cookies-wrapper",
		".change-cookies",
		"input[name=cookie-radio]",
		"#accept-cookie",
		"#submit-preferences",
		".cookies-settings-link button",
		".cookies-settings-cancel button"
	);

	/**
	|--------------------------------------------------
	| Validate form's
	|--------------------------------------------------
	*/
	validateForm(".validate-form");
	listenerKeyUpForm(".validate-form")

	/**
	|--------------------------------------------------
	| Custom Elements
	|--------------------------------------------------
	*/
	customSelect(".custom-select-option");
	customFileInput(".custom-file input");

});

//AOS animation text
AOS.init();

//Animation ball homepage
if(document.getElementById("div-animation-homepage")){

	
	// //disabled scroll untill finish animation
	// var body = document.getElementsByTagName("body");
	// body[0].classList.add("no-scroll");
	// setTimeout(function(){ body[0].classList.remove("no-scroll"); }, 5000);

	if(window.innerWidth < 992){
		gsap.to("#div-animation-homepage", {
			y: 380,
			scale: 0.95,
			transformOrigin:'bottom center',
			scrollTrigger: {
			  trigger: "#div-animation-homepage",
			  start: "0",
			  end: "380px",
			  scrub: true,
			  pinSpacing: false,
				pin: true,

			}
		});
	} else if(window.innerWidth >= 992 && window.innerWidth < 1280){
		gsap.to("#div-animation-homepage", {
			y: 890,
			scale: 0.78,
			transformOrigin:'bottom center',
			scrollTrigger: {
			  trigger: "#div-animation-homepage",
			  start: "0",
			  end: "890px",
			  scrub: true
			}
		});
	} else if(window.innerWidth >= 1280 && window.innerWidth < 1440){
		gsap.to("#div-animation-homepage", {
			y: 875,
			scale: 0.75,
			transformOrigin:'bottom center',
			scrollTrigger: {
			  trigger: "#div-animation-homepage",
			  start: "0",
			  end: "875px",
			  scrub: true
			}
		});
	} else if(window.innerWidth >= 1440 && window.innerWidth < 1600){
		gsap.to("#div-animation-homepage", {
			y: 1225,
			scale: 0.82,
			transformOrigin:'bottom center',
			scrollTrigger: {
			  trigger: "#div-animation-homepage",
			  start: "0",
			  end: "1225px",
			  scrub: true,
			}
		});
	} else {
		gsap.to("#div-animation-homepage", {
			y: 1380,
			scale: 0.87,
			transformOrigin:'top center',
			scrollTrigger: {
			  trigger: "#div-animation-homepage",
			  start: "0",
			  end: "1380px",
			  scrub: true,
			}
		});
	}

	//animation circle homepage
	if(window.innerWidth < 992){

		gsap.timeline({
			scrollTrigger: {
				trigger: ".section-homepage-circleScroll",
				pin: true,
				scrub:0.2,
				start: "-180px",
				end: "150px",
				// pinSpacing: false,
				// pin: "#div-animation-homepage",
				onEnter: () => classActive(),
				onEnterBack: () => classActive(),
				onLeave: () => classLeave(),
				onLeaveBack: () => removeClass(),
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		}, "<" )
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:169, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
		 	rotation:236, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", markers: true
		}, "<" )

	} 
	else if(window.innerWidth >= 992 && window.innerWidth < 1280){
	
		gsap.timeline({
			scrollTrigger: {
			trigger: ".section-homepage-circleScroll",
			pin: true,
			scrub:0.2,
			start: "-180px",
			end: "150px",
			pinSpacing: false,
			pin: "#div-animation-homepage",
			onEnter: () => classActive(),
			onEnterBack: () => classActive(),
			onLeave: () => classLeave(),
			onLeaveBack: () => removeClass(),
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:125, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )

	} else if(window.innerWidth >= 1280 && window.innerWidth < 1440){
	
		gsap.timeline({
			scrollTrigger: {
			trigger: ".section-homepage-circleScroll",
			pin: true,
			scrub:0.2,
			start: "-180px",
			end: "150px",
			pinSpacing: false,
			pin: "#div-animation-homepage",
			onEnter: () => classActive(),
			onEnterBack: () => classActive(),
			onLeave: () => classLeave(),
			onLeaveBack: () => removeClass(),
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:125, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )
		
	} else {
		gsap.timeline({
			scrollTrigger: {
				trigger: ".section-homepage-circleScroll",
				pin: true,
				scrub:0.2,
				start: "-180px",
				end: "150px",
				pinSpacing: false,
				pin: "#div-animation-homepage",
				onEnter: () => classActive(),
				onEnterBack: () => classActive(),
				onLeave: () => classLeave(),
				onLeaveBack: () => removeClass(),
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:132, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )
	}

	var element = document.querySelector('#div-animation-homepage');
	function classActive() {
		element.classList.add('active')
		element.classList.remove('leave')
	};
	function classLeave() {
		element.classList.remove('active')
		element.classList.add('leave')
	};
	function removeClass() {
		element.classList.remove('active')
		element.classList.remove('leave')
	};
}

//animation circle project overview
if(document.getElementsByClassName("section-po-circleScroll")){
	//animation circle
	if(window.innerWidth < 992){

		gsap.timeline({
			scrollTrigger: {
				trigger: ".section-po-circleScroll",
				pin: true,
				scrub:0.2,
				start: "-180px",
				end: "160px",
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:169, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
		 	rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )

	} else if(window.innerWidth >= 992 && window.innerWidth < 1280){
	
		gsap.timeline({
			scrollTrigger: {
			trigger: ".section-homepage-circleScroll",
			pin: true,
			scrub:0.2,
			start: "-180px",
			end: "150px",
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:125, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )

	} else if(window.innerWidth >= 1280 && window.innerWidth < 1440){
	
		gsap.timeline({
			scrollTrigger: {
			trigger: ".section-homepage-circleScroll",
			pin: true,
			scrub:0.2,
			start: "-180px",
			end: "150px",
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:125, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )
		
	} else {
		gsap.timeline({
			scrollTrigger: {
				trigger: ".section-homepage-circleScroll",
				pin: true,
				scrub:0.2,
				start: "-180px",
				end: "150px",
			}
		})
		.to('.divInfo1 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:125, duration:1, ease:'none', pin: true
		})
		.to('.divInfo2 div', {
			css:{opacity:1 }, start: "-280px", end: "-10px",  markers: true
		}, "<" )
		.to('.divInfo2 div', {
			css:{opacity:0 }
		})
		.to('.section-homepage-circleScroll-ballActive', {
			rotation:235, duration:1, ease:'none', pin: true
		})
		.to('.divInfo3 div', {
			css:{opacity:1 }, start: "-180px", end: "-10px", clearProps: "all", markers: true
		}, "<" )
		
	}
}


/* Slider Homepage */
if($(".carousel-homepage").length > 0){
	var slider = tns({
		container: '.carousel-homepage',
		items: 1,
		slideBy: 1,
		nav: true,
		navAsThumbnails: true,
		navPosition: "bottom",
		autoplay: true,
		autoplayButtonOutput: false,
		controls: false,
		mouseDrag: true,
		gutter: 20,
		responsive: {
			767: {
			  items:2
			},
		  },
	});

	//add and remove class 'div-item-scale'
	var allItems = document.getElementsByClassName("tns-item");
	for (let index = 0; index < allItems.length; index++) {
		allItems[index].classList.remove("div-item-scale");
	}
	var itemActive = document.getElementsByClassName("tns-slide-active");
	itemActive[0].classList.add("div-item-scale");

	slider.events.on("indexChanged", function(info) {
		var allItems = document.getElementsByClassName("tns-item");
		for (let index = 0; index < allItems.length; index++) {
			allItems[index].classList.remove("div-item-scale");
		}
		var itemActive = document.getElementsByClassName("tns-slide-active");
		itemActive[0].classList.add("div-item-scale");
	});	

	//autoplay when click line
	var buttonsNav = document.querySelectorAll('.tns-nav button');
	buttonsNav.forEach(element => {
		element.addEventListener('click', function(e) {
			setTimeout(slider.play, 500);
		})
	});

} else {
	if($(".section-homepage").length > 0){
		$(".footer")[0].classList.add("footer--white")
	}
}

// Slider Project Overview
if($(".carousel-projectOverview").length > 0){
	var slider1 = tns({
		container: '.carousel-projectOverview',
		items: 1,
		slideBy: 1,
		autoplay: true,
		autoplayButtonOutput: false,
		nav: true,
		navAsThumbnails: true,
		navPosition: "bottom",
		controls: false,
		gutter: 30,
		mouseDrag: true
	});
	slider1.events.on( 'indexChanged', evt => nextSlide( evt ));

	function nextSlide( evt ) {
		// hack beacause of strange idexes from tns slider
		const indexToGoTo = evt.index > slider1.getInfo().slideCount ? 0 : evt.index - 1;
		slider2.goTo( indexToGoTo );
	}

	//autoplay when click line
	var buttonsNav1 = document.querySelectorAll('.tns-nav button');
	buttonsNav1.forEach(element => {
		element.addEventListener('click', function(e) {
			setTimeout(slider1.play, 500);
		})
	});

	var slider2 = tns({
		container: '.carousel-projectOverview1',
		items: 1,
		slideBy: 1,
		autoplay: false,
		autoplayButtonOutput: false,
		nav: false,
		controls: false,
		gutter: 30,
	});
}

