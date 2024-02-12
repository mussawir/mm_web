$(document).ready(function () {
	"use strict";

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		var box = $('.header-text').height();
		var header = $('header').height();

		if (scroll >= box - header) {
			$("header").addClass("background-header");
		} else {
			$("header").removeClass("background-header");
		}
	});

	// $('.input-group.date').datepicker({format: "dd.mm.yyyy"});

	$(".date-selector").flatpickr();
	$(".time-selector").flatpickr({
		enableTime: true,
		noCalendar: true,
		dateFormat: "H:i",
	});

	$('.filters ul li').click(function() {
		$('.filters ul li').removeClass('active');
		$(this).addClass('active');

		var data = $(this).attr('data-filter');
		$grid.isotope({
			filter: data
		});
	});

	var $grid = $(".grid").isotope({
		itemSelector: ".all",
		percentPosition: true,
		masonry: {
			columnWidth: ".all"
		}
	});

	$('.search-icon a').on("click", function(event) {
		event.preventDefault();
		$("#search").addClass("open");
		$('#search > form > input[type="search"]').focus();
	});

	$("#search, #search button.close").on("click keyup", function(event) {
		if (event.target == this || event.target.className == "close" || event.keyCode == 27) {
			$(this).removeClass("open");
		}
	});

	$("#search-box").submit(function(event) {
		event.preventDefault();return false;

	});

	$(function() {
		$("#tabs").tabs();
	});

	$('#categoriesCarousel').owlCarousel({
		lazyLoad:true,
		responsive:{
			0:{
				items:3
			},
			600:{
				items:5
			},
			1000:{
				items:8
			}
		}
	});

	$('#dealsCarousel').owlCarousel({
		margin:10,
		lazyLoad:true,
		responsive:{
			0:{
				items:1.5
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});

	mobileNav();

	// Get the button:
	let mybutton = document.getElementById("myBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {
		scrollFunction();
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	$('.back-to-top').on("click", function() {
		topFunction();
	});

	// Get all the nav links
	var navLinks = document.querySelectorAll(".nav-link");

	// Add click event listeners to the nav links
	navLinks.forEach(function(link) {
		link.addEventListener("click", function() {
			// Remove the 'active' class from all nav links
			navLinks.forEach(function(navLink) {
				navLink.classList.remove("active");
			});
			// Add the 'active' class to the clicked nav link
			link.classList.add("active");
		});
	});

	const swiper = new Swiper('.swiper', {
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		}
	});
});

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function mobileNav() {
	var width = $(window).width();

	$('.submenu').on('click', function() {
		if(width < 767) {
			$('.submenu ul').removeClass('active');
			$(this).find('ul').toggleClass('active');
		}
	});
}
