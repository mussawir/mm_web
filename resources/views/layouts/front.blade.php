<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

		<title>@yield('title', 'Maza Max')</title>

		@laravelPWA

		{{-- Favicon --}}
		<link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
		<link rel="icon" type="image/ico" href="/assets/images/favicon.ico">

		{{-- Additional CSS Files --}}
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap5.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/all.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/store-front.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/assets/css/swiper-bundle.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('/assets/css/flatpickr.min.css') }}">

		{{-- CDN Links --}}
		<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/toastify.min.css') }}">
		<script type="text/javascript" src="{{ asset('/assets/js/toastify.js') }}"></script>

		@yield('css')
	</head>
	<body class="vstack min-vh-100">
		@include('layouts.header')

		<div class="custom-container m-0 p-0">
			@if(session('success'))
				<script>
					Toastify({
						text: "{{ session('success') }}",
						close: true,
						className: 'rounded',
						gravity: "bottom",
						position: "center",
						stopOnFocus: true,
						offset: {
							y: '4rem'
						},
						style: {
							background: "linear-gradient(to right, #00b09b, #96c93d)",
						}
					}).showToast();
				</script>
			@endif
			@if(session('danger'))
				<script>
					Toastify({
						text: "{{ session('danger') }}",
						close: true,
						className: 'rounded',
						gravity: "bottom",
						position: "center",
						stopOnFocus: true,
						offset: {
							y: '4rem'
						},
						style: {
							background: "#dc3545",
						}
					}).showToast();
				</script>
			@endif
			@yield('content')
			@include('modals.choose-location')
			@php
				$cartItemCount = count(session('cart', []));
			@endphp
		</div>

		@include('layouts.footer')

		{{-- jQuery --}}
		<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>

		{{-- Bootstrap --}}
		<script src="{{ asset('/assets/js/bootstrap5.bundle.min.js') }}"></script>

		{{-- Plugins --}}
		<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('/assets/js/accordions.js') }}"></script>
		<script src="{{ asset('/assets/js/slick.js') }}"></script>
		<script src="{{ asset('/assets/js/isotope.js') }}"></script>
		<script src="{{ asset('/assets/js/swiper-bundle.min.js') }}"></script>
		<script src="{{ asset('/assets/js/flatpickr.js') }}"></script>

		{{-- Global Init --}}
		<script src="{{ asset('/assets/js/custom.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
		<script type="text/javascript">
			$(".increase-quantity").click(function (e) {
				e.preventDefault();
				let ele = $(this);
				updateCartQuantity(ele, 1);
			});

			$(".decrease-quantity").click(function (e) {
				e.preventDefault();
				let ele = $(this);
				updateCartQuantity(ele, -1);
			});

			function updateCartQuantity(ele, quantityChange) {
				let id = ele.data("id");
				let type = ele.data("type");
				let quantityElement = ele.siblings(".quantity");
				let currentQuantity = parseInt(quantityElement.text(), 10);

				let newQuantity = currentQuantity + quantityChange;

				if (newQuantity >= 0) {
					quantityElement.text(newQuantity);

					$.ajax({
						url: "{{ route('cart.update') }}",
						method: "POST",
						data: {
							_token: $('meta[name="csrf-token"]').attr("content"),
							id: id,
							type: type,
							quantity: newQuantity
						},
						success: function (response) {
							window.location.reload();
						}
					});
				}
			}

			$(".remove-from-cart").click(function (e)
			{
				e.preventDefault();

				let ele = $(this);

				if(confirm("Are you sure want to remove?"))
				{
					$.ajax({
						url: "{{ route('cart.remove') }}",
						method: "POST",
						data: {
							_token: $('meta[name="csrf-token"]').attr("content"),
							id: ele.parents('div').attr('data-id'),
							type: ele.parents('div').attr('data-type')
						},
						success: function (response) {
							window.location.reload();
						}
					});
				}
			});
		</script>
		<script type="text/javascript">
			let myModal = new bootstrap.Modal('#myModal');

			let openModalButton = document.querySelector('.location');

			let citySelect = document.getElementById('citySelect');
			let branchSelect = document.getElementById('branchSelect');
			let cityContainer = document.getElementById('cityContainer');
			let branchContainer = document.getElementById('branchContainer');
			let cardTitle = document.getElementById('cardTitle');
			let saveButton = document.querySelector('.save-option');

			document.addEventListener('DOMContentLoaded', () => {
				const selectedOption = localStorage.getItem('selectedOption');
				// const selectedCity = localStorage.getItem('selectedCity');
				// const selectedBranch = localStorage.getItem('selectedBranch');
				// const cityName = localStorage.getItem('cityName');
				// const branchName = localStorage.getItem('branchName');

				// const sessionBranch = @js(session('selectedBranch'));
				const deliveryType = document.querySelectorAll('input[name="deliveryPickupOption"]');

				// if (selectedBranch && (!sessionBranch)) {
				// 	saveSelectedBranchToSession(selectedBranch);
				// }

				// Add an event listener to the button to open the modal
				openModalButton.addEventListener('click', () => {
					myModal.show();
					// fetchCities(selectedCity);
				});

				if (selectedOption === 'pickup')
				{
					cardTitle.textContent = 'Your location';
				}
				else if (selectedOption === 'delivery')
				{
					cardTitle.textContent = 'Your location';
				}
				else if (this.value === 'dine-in')
				{
					cardTitle.textContent = 'Go to reservation page';
				}

				if (selectedOption)
				{
					myModal.hide();
				}
				else
				{
					myModal.show();
					// fetchCities(selectedCity);
				}

				updateButtonText(selectedOption);
				updateSaveButtonState();

				deliveryType.forEach(type => {
					if (selectedOption == type.value) {
						type.checked = true;
					}
					else {
						if (type.value == 'delivery') {
							type.checked = true;
						}
					}
				});
			});

			function saveOption()
			{
				const selectedOption = document.querySelector('input[name="deliveryPickupOption"]:checked');

				if (selectedOption)
				{
					// localStorage.setItem('selectedOption', selectedOption.value);

					// const selectedCity = document.getElementById('citySelect');
					// const selectedBranch = document.getElementById('branchSelect');

					// const storedCity = localStorage.getItem('selectedCity');
					// const storedBranch = localStorage.getItem('selectedBranch');

					const locationCoords = localStorage.getItem('locationCoords');

					if (locationCoords) {
						// myModal.hide();
						if (selectedOption.value === 'dine-in') {
							window.location.href = '/reservation';
						}

						localStorage.setItem('selectedOption', selectedOption.value);

						fetchVendorsForBranch();

						updateButtonText(selectedOption.value);

						myModal.hide();
					} else {
						// const cartItemCount = @json($cartItemCount);
						// let shouldChange = false;

						// if (cartItemCount > 0) {
						// 	shouldChange = window.confirm("This will clear your cart. Are you sure you want to proceed?");
						// }

						// if (shouldChange) {
						// 	// Clear the cart when the branch changes
						// 	clearCart();
						// }

						
						// localStorage.setItem('selectedCity', selectedCity.value);
						// localStorage.setItem('selectedBranch', selectedBranch.value);
						// localStorage.setItem('cityName', selectedCity.options[selectedCity.selectedIndex].textContent);
						// localStorage.setItem('branchName', selectedBranch.options[selectedBranch.selectedIndex].textContent);

						// saveSelectedBranchToSession(selectedBranch.value);

						// fetchVendorsForBranch();

						// updateButtonText(selectedOption.value, selectedCity.options[selectedCity.selectedIndex].textContent, selectedBranch.options[selectedBranch.selectedIndex].textContent);

						// myModal.hide();
					}
				}
			}

			function fetchVendorsForBranch() {
				// const selectedBranch = localStorage.getItem('selectedBranch');
				const locationCoords = localStorage.getItem('locationCoords');

				if (!locationCoords) {
					return;
				}

				$.ajax({
					url: `/load-vendors`,
					method: "POST",
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
					},
					data: {
						locationCoords: locationCoords
					},
					success: function(response) {
						updateVendorsView(response.vendors);
					},
					error: function(error) {
						console.error('Error loading vendors:', error);
					}
				});
			}

			function updateVendorsView(vendors)
			{
				const dropdown = document.getElementById('options');
				const vendorContent = document.getElementById('vendorContent');
				vendorContent.innerHTML = '';

				if (vendors.length) {
					vendors.forEach(vendor => {
						const vendorElement = document.createElement('div');
						vendorElement.classList.add('vendor-title', 'col-12', 'col-lg-4', 'col-md-6', 'px-2');
						vendorElement.dataset.vendorType = (vendor.vendor_type.is_food) ? 'food' : 'general';

						if (dropdown.value === vendorElement.dataset.vendorType) {
							vendorElement.style.display = 'block';
						} else {
							vendorElement.style.display = 'none';
						}

						const vendorTitle = document.createElement('div');
						vendorTitle.classList.add('overflow-hidden', 'mw-100', 'rounded-4', 'shadow-lg', 'm-3', 'position-relative', 'border', 'border-secondary-subtle');

						const vendorLink = document.createElement('a');
						vendorLink.href = 'vendors/detail/' + vendor.id;

						const vendorImageContainer = document.createElement('div');
						vendorImageContainer.classList.add('rounded-3', 'position-relative');

						const vendorImageContainer2 = document.createElement('div');
						vendorImageContainer2.classList.add('d-flex', 'align-items-center', 'justify-content-center', 'overflow-hidden');
						vendorImageContainer2.style.cssText = 'aspect-ratio: 16/9; border-top-left-radius: 12px; border-top-right-radius: 12px; background-color: #f7f7f7;';

						const vendorImage = document.createElement('img');
						vendorImage.src = '/images/vendors/banners/' + vendor.banner1;
						vendorImage.classList.add('card-img-bg', 'position-relative');
						vendorImage.loading = 'lazy';

						vendorImageContainer2.appendChild(vendorImage);

						const vendorDetails = document.createElement('div');
						vendorDetails.classList.add('m-3', 'position-absolute');
						vendorDetails.style.cssText = 'inset:0;';

						const wrapperDiv = document.createElement('div');
						wrapperDiv.classList.add('d-flex', 'flex-column', 'start-0', 'position-absolute', 'top-0');

						const discountBadge = createBadge('20% off');
						const giftBadge = createBadge('Welcome gift: free de...');

						wrapperDiv.appendChild(discountBadge);
						wrapperDiv.appendChild(giftBadge);

						const featuredBadge = document.createElement('div');
						featuredBadge.classList.add('d-inline-flex', 'align-items-center', 'text-center', 'bottom-0', 'end-0', 'position-absolute');
						featuredBadge.style.cssText = 'background-color: #333333cc; border-radius: 9999px; height: 16px; padding: 2px 8px; column-gap: 2px; max-width: 232px;';

						const featuredText = document.createElement('span');
						featuredText.classList.add('fw-semibold', 'text-white');
						featuredText.style.fontSize = '10px';
						featuredText.textContent = 'Featured';

						featuredBadge.appendChild(featuredText);

						vendorDetails.appendChild(wrapperDiv);
						vendorDetails.appendChild(featuredBadge);

						vendorImageContainer.appendChild(vendorImageContainer2);
						vendorImageContainer.appendChild(vendorDetails);

						const vendorInfo = document.createElement('div');
						vendorInfo.classList.add('d-flex', 'flex-column');
						vendorInfo.style.cssText = 'margin: 12px;';

						const vendorName = document.createElement('div');
						vendorName.classList.add('mb-1', 'd-flex', 'align-items-center', 'fw-semibold', 'fs-6');
						vendorName.style.color = '#333333';

						const nameText = document.createElement('div');
						nameText.classList.add('fw-semibold', 'fs-6', 'text-truncate');
						nameText.textContent = vendor.company_name;

						const ratingContainer = document.createElement('div');
						ratingContainer.classList.add('d-inline-flex', 'flex-nowrap', 'align-items-center', 'justify-content-end', 'flex-shrink-0', 'ms-auto');
						ratingContainer.style.maxWidth = '232px';

						const starIcon = document.createElement('div');
						starIcon.classList.add('d-inline-flex', 'align-items-center', 'justify-content-center', 'me-1');

						const starImage = document.createElement('img');
						starImage.src = 'assets/images/avatars/rating-star.png';
						starImage.width = '14';
						starImage.height = '14';
						starImage.alt = 'Restaurant Rating';

						starIcon.appendChild(starImage);

						const ratingValue = document.createElement('span');
						ratingValue.classList.add('fw-semibold', 'text-truncate', 'fs-7');
						ratingValue.style.marginLeft = '2px';
						ratingValue.style.color = '#333333';
						ratingValue.textContent = '4.2';

						const reviewCount = document.createElement('span');
						reviewCount.classList.add('text-truncate', 'fs-7');
						reviewCount.style.marginLeft = '2px';
						reviewCount.style.color = '#767676';
						reviewCount.textContent = '(1000+)';

						ratingContainer.appendChild(starIcon);
						ratingContainer.appendChild(ratingValue);
						ratingContainer.appendChild(reviewCount);

						vendorName.appendChild(nameText);
						vendorName.appendChild(ratingContainer);

						const priceAndCategory = document.createElement('div');
						priceAndCategory.classList.add('ms-0', 'd-block', 'text-truncate');
						priceAndCategory.style.lineHeight = '16px';
						priceAndCategory.style.color = '#666666';
						priceAndCategory.style.marginRight = 'unset';

						const priceContainer = document.createElement('div');
						priceContainer.classList.add('fw-semibold', 'fs-7', 'align-middle', 'd-inline');
						priceContainer.style.marginRight = '2px';
						priceContainer.style.color = '#666666';

						const priceValue = document.createElement('div');
						priceValue.classList.add('d-inline', 'fw-semibold', 'fs-7');
						priceValue.textContent = '$$$';

						priceContainer.appendChild(priceValue);

						const separator1 = document.createElement('div');
						separator1.classList.add('d-inline', 'fw-semibold', 'fs-7', 'align-middle');
						separator1.style.color = '#cacaca';
						separator1.style.margin = '0 4px 0 2px';
						separator1.textContent = '•';

						const categoryContainer = document.createElement('div');
						categoryContainer.classList.add('fw-semibold', 'd-inline', 'fs-7', 'align-middle');
						categoryContainer.style.marginRight = '2px';
						categoryContainer.style.color = '#666666';

						const categoryValue = document.createElement('div');
						categoryValue.classList.add('fw-semibold', 'd-inline', 'fs-7');
						categoryValue.textContent = 'Burgers';

						categoryContainer.appendChild(categoryValue);

						priceAndCategory.appendChild(priceContainer);
						priceAndCategory.appendChild(separator1);
						priceAndCategory.appendChild(categoryContainer);

						vendorInfo.appendChild(vendorName);
						vendorInfo.appendChild(priceAndCategory);

						vendorLink.appendChild(vendorImageContainer);
						vendorLink.appendChild(vendorInfo);

						vendorTitle.appendChild(vendorLink);
						vendorElement.appendChild(vendorTitle);

						vendorContent.appendChild(vendorElement);
					});
				}
				else {
					vendorContent.textContent = 'We are coming to this area soon.'
				}
			}

			function createBadge(text) {
				const badge = document.createElement('div');
				badge.classList.add('d-inline-flex', 'align-items-center', 'rounded-2', 'py-1', 'px-2', 'text-center', 'mb-1', 'text-white');
				badge.style.cssText = 'column-gap: 2px; height: 24px; max-width: 232px; width: max-content; background: linear-gradient(90deg, #1F92DE 0%, #199AFC 100%)';

				const badgeIcon = document.createElement('span');
				badgeIcon.classList.add('d-flex');

				const badgeSvg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
				badgeSvg.setAttribute('aria-hidden', 'true');
				badgeSvg.setAttribute('focusable', 'false');
				badgeSvg.setAttribute('width', '16');
				badgeSvg.setAttribute('height', '16');
				badgeSvg.setAttribute('viewBox', '0 0 16 16');
				badgeSvg.style.fill = '#FFFFFF';

				const badgePath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
				badgePath.setAttribute('fill-rule', 'evenodd');
				badgePath.setAttribute('clip-rule', 'evenodd');
				badgePath.setAttribute('d', 'M9.34515 2.56637C8.60771 1.8104 7.39229 1.8104 6.65485 2.56637L6.60681 2.61562C6.25315 2.97816 5.76812 3.1826 5.26165 3.1826H5.06237C4.02454 3.1826 3.18321 4.02393 3.18321 5.06177V5.26105C3.18321 5.76751 2.97877 6.25254 2.61623 6.6062L2.56698 6.65424C1.81101 7.39168 1.81101 8.6071 2.56698 9.34454L2.61623 9.39258C2.97877 9.74624 3.18321 10.2313 3.18321 10.7377V10.937C3.18321 11.9748 4.02454 12.8162 5.06238 12.8162H5.26166C5.76812 12.8162 6.25315 13.0206 6.60681 13.3832L6.65485 13.4324C7.39229 14.1884 8.60771 14.1884 9.34515 13.4324L9.39319 13.3832C9.74685 13.0206 10.2319 12.8162 10.7383 12.8162H10.9376C11.9755 12.8162 12.8168 11.9748 12.8168 10.937V10.7377C12.8168 10.2313 13.0212 9.74624 13.3838 9.39258L13.433 9.34454C14.189 8.6071 14.189 7.39168 13.433 6.65424L13.3838 6.6062C13.0212 6.25254 12.8168 5.76751 12.8168 5.26104V5.06176C12.8168 4.02393 11.9755 3.1826 10.9376 3.1826H10.7383C10.2319 3.1826 9.74685 2.97816 9.39319 2.61562L9.34515 2.56637ZM6.25 7.24939C6.80228 7.24939 7.25 6.80167 7.25 6.24939C7.25 5.6971 6.80228 5.24939 6.25 5.24939C5.69772 5.24939 5.25 5.6971 5.25 6.24939C5.25 6.80167 5.69772 7.24939 6.25 7.24939ZM10.1214 5.87833C9.92611 5.68307 9.60953 5.68307 9.41427 5.87833L5.87873 9.41387C5.68347 9.60913 5.68347 9.92571 5.87873 10.121C6.074 10.3162 6.39058 10.3162 6.58584 10.121L10.1214 6.58544C10.3166 6.39018 10.3166 6.0736 10.1214 5.87833ZM10.75 9.74939C10.75 10.3017 10.3023 10.7494 9.75 10.7494C9.19772 10.7494 8.75 10.3017 8.75 9.74939C8.75 9.1971 9.19772 8.74939 9.75 8.74939C10.3023 8.74939 10.75 9.1971 10.75 9.74939Z');

				badgeSvg.appendChild(badgePath);
				badgeIcon.appendChild(badgeSvg);

				const badgeText = document.createElement('span');
				badgeText.classList.add('overflow-hidden', 'fw-semibold');
				badgeText.style.cssText = 'text-overflow:ellipsis; white-space: nowrap; font-size: 12px;';
				badgeText.textContent = text;

				badge.appendChild(badgeIcon);
				badge.appendChild(badgeText);

				return badge;
			}

			// function fetchCityBranchCount() {
			// 	return fetch(`/api/v1/city/branch/count`)
			// 		.then(response => response.json())
			// 		.then(data => data.data)
			// 		.catch(error => {
			// 			console.error('Error fetching count:', error);
			// 		});
			// }

			// function fetchCities(selectedCity) {
			// 	fetch(`/api/v1/city/list`)
			// 	.then(response => response.json())
			// 	.then(data => {
			// 		citySelect.innerHTML = '';

			// 		const defaultOption = document.createElement('option');
			// 		defaultOption.value = "";
			// 		defaultOption.textContent = "Select City";
			// 		citySelect.appendChild(defaultOption);

			// 		data.data.forEach(city => {
			// 			const option = document.createElement('option');
			// 			option.value = city.id;
			// 			option.textContent = city.name;
			// 			if (selectedCity && selectedCity == city.id)
			// 			{
			// 				option.selected = true;
			// 			}
			// 			citySelect.appendChild(option);
			// 		});

			// 		if (selectedCity)
			// 		{
			// 			fetchBranches();
			// 		}
			// 	})
			// 	.catch(error => {
			// 		console.error('Error fetching cities:', error);
			// 	});
			// }

			// function fetchBranches() {
			// 	const cityId = citySelect.value;

			// 	const selectedBranch = localStorage.getItem('selectedBranch');

			// 	if (cityId)
			// 	{
			// 		// Fetch branches for the selected city
			// 		fetch(`/api/v1/city/branches/list/${cityId}`)
			// 		.then(response => response.json())
			// 		.then(data => {
			// 			branchContainer.style.display = 'block';
			// 			branchSelect.innerHTML = '';

			// 			const defaultOption = document.createElement('option');
			// 			defaultOption.value = "";
			// 			defaultOption.textContent = "Select Area";
			// 			branchSelect.appendChild(defaultOption);

			// 			// Populate the branch select with new branch options
			// 			data.data.forEach(branch => {
			// 				const option = document.createElement('option');
			// 				option.value = branch.id;
			// 				if (selectedBranch && selectedBranch == branch.id)
			// 				{
			// 					option.selected = true;
			// 					saveButton.disabled = false;
			// 				}
			// 				option.textContent = branch.name;
			// 				branchSelect.appendChild(option);
			// 			});
			// 		})
			// 		.catch(error => {
			// 			console.error('Error fetching branches:', error);
			// 		});
			// 	}
			// 	else
			// 	{
			// 		branchContainer.style.display = 'none';
			// 	}
			// }

			function updateSaveButtonState() {
				const selectedOption = document.querySelector('input[name="deliveryPickupOption"]:checked');

				// const selectedBranch = branchSelect.value;

				// if (selectedOption && selectedBranch) {
				// 	saveButton.disabled = false;
				// } else {
				// 	saveButton.disabled = true;
				// }
			}

			// Event listener for the branch select change
			// branchSelect.addEventListener('change', () => {
			// 	updateSaveButtonState();
			// });

			// function saveSelectedBranchToSession(selectedBranch) {
			// 	if (selectedBranch)
			// 	{
			// 		$.ajax({
			// 			type: 'POST',
			// 			url: '{{ route('save.selectedBranch') }}',
			// 			headers: {
			// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
			// 			},
			// 			data: {
			// 				selectedBranch: selectedBranch
			// 			},
			// 			success: function(response) {
			// 				if (response.data == true) {
			// 					fetchVendorsForBranch();
			// 				}
			// 			},
			// 			error: function(error) {
			// 				console.error('Error saving selected branch:', error);
			// 			}
			// 		});
			// 	}
			// }

			// function clearCart() {
			// 	fetch('/clear-cart', {
			// 		method: 'POST',
			// 		headers: {
			// 			'Content-Type': 'application/json',
			// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
			// 		},
			// 	})
			// 	.then(response => {
			// 		if (response.ok) {
			// 			alert ('Cart cleared successfully.')
			// 			window.location.href = '/';
			// 		}
			// 		else {
			// 			// Handle errors if clearing the cart fails
			// 		}
			// 	})
			// 	.catch(error => {
			// 		console.error('Error clearing the cart:', error);
			// 	});
			// }

			// Event listener for the city change
			// citySelect.addEventListener('change', fetchBranches);

			// Event listener for the radio buttons
			document.querySelectorAll('input[name="deliveryPickupOption"]').forEach(radio => {
				radio.addEventListener('change', function() {
					if (this.value === 'pickup') {
						cardTitle.textContent = 'Your location';
					} else if (this.value === 'delivery') {
						cardTitle.textContent = 'Your location';
					} else if (this.value === 'dine-in') {
						cardTitle.textContent = 'Go to reservation page';
					}
				});
			});

			function updateButtonText(selectedOption)
			{
				const button = document.querySelector('.location');
				const placeSpan = document.querySelector('.place');

				const placeName = localStorage.getItem('address');

				placeSpan.textContent = placeName || '';

				// const cityBranchCountPromise = fetchCityBranchCount();

				// cityBranchCountPromise.then(cityBranchCount => {
				// 	if (cityBranchCount.cityCount == 1 || cityBranchCount.branchCount == 1) {
				// 		changeBranchLocationSpan.textContent = cityName;
				// 		branchCitySpan.textContent = branchName;
				// 	} else {
				// 		if (selectedOption === 'pickup') {
				// 		changeBranchLocationSpan.textContent = 'Change Area';
				// 		branchCitySpan.textContent = branchName;
				// 		} else {
				// 			changeBranchLocationSpan.textContent = 'Change Location';
				// 			branchCitySpan.textContent = cityName;
				// 		}
				// 	}
				// });
			}
		</script>
		@yield('js')
	</body>
</html>
