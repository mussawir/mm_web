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

let map;

// async function initialize() {
// 	try {
// 		let pos;

// 		const storedCoords = localStorage.getItem('locationCoords');

// 		if (storedCoords) {
// 			const { lat, long } = JSON.parse(storedCoords);
// 			pos = { lat, lng: long };
// 		} else {
// 			const currentPosition = await getCurrentPosition();
// 			pos = {
// 				lat: currentPosition.coords.latitude,
// 				lng: currentPosition.coords.longitude,
// 			};
// 		}

// 		const locationInputs = document.getElementsByClassName("map-input");
// 		const autocompletes = [];
// 		const geocoder = new google.maps.Geocoder;

// 		for (let i = 0; i < locationInputs.length; i++) {
// 			const input = locationInputs[i];
// 			const options = {
// 				componentRestrictions: { country: "pk" },
// 			};
// 			const fieldKey = input.id.replace("-input", "");
// 			const isEdit = false;
// 			const latitude = parseFloat(pos.lat);
// 			const longitude = parseFloat(pos.lng);

// 			map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
// 				zoom: 13,
// 				center: {lat: latitude, lng: longitude},
// 			});

// 			const marker = new google.maps.Marker({
// 				map: map,
// 				animation: google.maps.Animation.DROP,
// 				position: {lat: latitude, lng: longitude},
// 			});

// 			marker.setVisible(isEdit);

// 			const autocomplete = new google.maps.places.Autocomplete(input, options);
// 			autocomplete.key = fieldKey;
// 			autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
// 		}

// 		for (let i = 0; i < autocompletes.length; i++) {
// 			const input = autocompletes[i].input;
// 			const autocomplete = autocompletes[i].autocomplete;
// 			const map = autocompletes[i].map;
// 			const marker = autocompletes[i].marker;

// 			google.maps.event.addListener(autocomplete, 'place_changed', function () {
// 				marker.setVisible(false);
// 				const place = autocomplete.getPlace();

// 				geocoder.geocode({'placeId': place.place_id}, function (results, status) {
// 					if (status === google.maps.GeocoderStatus.OK) {
// 						const lat = results[0].geometry.location.lat();
// 						const lng = results[0].geometry.location.lng();

// 						setLocationCoordinates(place, lat, lng);
// 					}
// 				});

// 				if (!place.geometry) {
// 					window.alert("No details available for input: '" + place.name + "'");
// 					input.value = "";
// 					return;
// 				}

// 				if (place.geometry.viewport) {
// 					map.fitBounds(place.geometry.viewport);
// 				} else {
// 					map.setCenter(place.geometry.location);
// 					map.setZoom(17);
// 				}
// 				marker.setPosition(place.geometry.location);
// 				marker.setVisible(true);

// 			});
// 		}
// 		if (storedCoords) {
// 			map.setCenter(pos);
// 			map.setZoom(13);

// 			// geocoder
// 			// .geocode({ location: pos })
// 			// .then((response) => {
// 			// 	if (response.results[0]) {
// 			// 		map.setCenter(pos);
// 			// 		map.setZoom(13);
					
// 			// 		new google.maps.Marker({
// 			// 			position: pos,
// 			// 			map: map,
// 			// 			animation: google.maps.Animation.DROP
// 			// 		});

// 			// 		const address = response.results[0].formatted_address;
// 			// 		document.getElementById('address-input').value = address;
// 			// 	} else {
// 			// 		console.log("No results found");
// 			// 	}
// 			// })
// 			// .catch((e) => console.log("Geocoder failed due to: " + e));
// 		}
// 		new google.maps.Marker({
// 			position: pos,
// 			map: map,
// 			animation: google.maps.Animation.DROP
// 		});
// 	} catch (error) {
// 		console.log(error);
// 	}
// }

// function getCurrentPosition() {
// 	return new Promise((resolve, reject) => {
// 		if (navigator.geolocation) {
// 			navigator.geolocation.getCurrentPosition(resolve, reject);
// 		} else {
// 			reject("Geolocation is not supported by this browser.");
// 		}
// 	});
// }

// function setLocationCoordinates(place, lat, lng) {
// 	const locationCoords = JSON.stringify({lat: lat, long: lng});
// 	localStorage.setItem('locationCoords', locationCoords);
// 	localStorage.setItem('address', place.name);
// 	localStorage.setItem('formattedAddress', place.formatted_address);
// }

// document.getElementById('locate-me').addEventListener('click', function() {
// 	getCurrentPosition().then(position => {
// 		const currentLocation = {
// 			lat: position.coords.latitude,
// 			lng: position.coords.longitude
// 		};

// 		// Center the map to the user's current location
// 		map.setCenter(currentLocation);
// 		map.setZoom(15);

// 		const geocoder = new google.maps.Geocoder();

// 		geocoder.geocode({ location: currentLocation }, (results, status) => {
// 			if (status === 'OK') {
// 				if (results[0]) {
// 					const formattedAddress = results[0].formatted_address;

// 					// Do something with the formatted address, such as saving or displaying it
// 					console.log('Formatted Address:', formattedAddress);
// 				} else {
// 					console.error('No results found');
// 				}
// 			} else {
// 				console.error('Geocoder failed due to: ' + status);
// 			}
// 		});

// 		new google.maps.Marker({
// 			position: currentLocation,
// 			map: map,
// 			animation: google.maps.Animation.DROP
// 		});
// 	}).catch(error => {
// 		console.error('Error getting current position:', error);
// 	});
// });

// const locationCoords = JSON.parse(localStorage.getItem('locationCoords'));

// if (locationCoords) {
// 	const lat = locationCoords.lat;
// 	const lng = locationCoords.long;
	
// 	geocodeLatLng(lat, lng);
// } else {
// 	console.error('No coordinates found in local storage');
// }

// function geocodeLatLng(geocoder, map) {
// 	const input = document.getElementById("latlng").value;
// 	const latlngStr = input.split(",", 2);
	
// 	const latlng = {
// 		lat: parseFloat(latlngStr[0]),
// 		lng: parseFloat(latlngStr[1]),
// 	};

// 	geocoder
// 		.geocode({ location: latlng })
// 		.then((response) => {
// 			if (response.results[0]) {
// 				map.setZoom(11);
				
// 				const marker = new google.maps.Marker({
// 					position: latlng,
// 					map: map,
// 				});
// 			} else {
// 				window.alert("No results found");
// 			}
// 		})
// 		.catch((e) => window.alert("Geocoder failed due to: " + e));
// }