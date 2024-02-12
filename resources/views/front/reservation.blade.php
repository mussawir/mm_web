@extends('layouts.front')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-body bg-secondary-subtle my-5">
				<h5 class="card-title display-6 text-center text-uppercase py-4">
					{{ __('Reservation Form') }}
				</h5>
				<form method="POST" action="{{ route('reservation') }}" id="reservationForm">
					@csrf
					<div class="mb-3">
						<label for="name" class="form-label">
							Name
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<input
							type="text"
							class="form-control @error('name') is-invalid @enderror"
							id="name"
							name="name"
							value="{{ old('name', Auth::guard('customer')->user()->name ?? '') }}"
							aria-required='true'
							placeholder="Enter your name"
						>
						<span class="invalid-feedback" id="nameError" role="alert">
							<strong>
								{{ $errors->first('name') }}
							</strong>
						</span>
					</div>
					<div class="mb-3">
						<label for="phone" class="form-label">
							Phone Number
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<input
							type="tel"
							class="form-control @error('phone') is-invalid @enderror"
							id="phone"
							name="phone"
							value="{{ old('phone', Auth::guard('customer')->user()->phone_number ?? '') }}"
							aria-required="true"
							placeholder="Enter your phone number"
						>
						<span class="invalid-feedback" id="phoneError" role="alert">
							<strong>
								{{ $errors->first('phone') }}
							</strong>
						</span>
					</div>
					<div class="mb-3">
						<label for="reservation_date" class="form-label">
							Reservation Date
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<input
							type="text"
							class="form-control date-selector @error('reservation_date') is-invalid @enderror"
							value="{{ old('reservation_date') }}"
							id="reservation_date"
							name="reservation_date"
						/>
						<span class="invalid-feedback" id="reservation_dateError" role="alert">
							<strong>
								{{ $errors->first('reservation_date') }}
							</strong>
						</span>
					</div>
					<div class="mb-3">
						<label for="reservation_time" class="form-label">
							Reservation Time
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<input
							type="text"
							id="reservation_time"
							class="form-control time-selector @error('reservation_time') is-invalid @enderror"
							value="{{ old('reservation_time') }}"
							name="reservation_time"
						/>
						<span class="invalid-feedback" id="reservation_timeError" role="alert">
							<strong>
								{{ $errors->first('reservation_time') }}
							</strong>
						</span>
					</div>
					<div class="d-flex justify-content-center align-items-center">
						<button type="submit" class="btn btn-primary">
							Submit Reservation
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	let reservationForm = document.getElementById('reservationForm');

	document.addEventListener('DOMContentLoaded', () => {
		let phoneInput = document.getElementById('phone');

		phoneInput.addEventListener('input', function(event) {
			let inputValue = phoneInput.value;

			// Remove any non-digit characters from the input
			let numericValue = inputValue.replace(/\D/g, '');

			// Limit the input to a maximum of 12 digits
			if (numericValue.length > 12) {
				phoneInput.value = numericValue.slice(0, 12);
			}
		});

		// Event listener for the reservation form submission
		reservationForm.addEventListener('submit', function (event) {
			event.preventDefault();
			// Collect form data
			const formData = new FormData(reservationForm);
			const reservationData = {
				name: formData.get('name'),
				phone: formData.get('phone'),
				reservation_date: formData.get('reservation_date'),
				reservation_time: formData.get('reservation_time'),
			};

			let branch = localStorage.getItem('selectedBranch');

			if (branch)
			{
				fetch(`/api/v1/reservation/add/${branch}`, {
					method: 'POST',
					headers: {
					'Content-Type': 'application/json'
					},
					body: JSON.stringify(reservationData)
				})
				.then(response => response.json())
				.then(data => {

					// Clear any existing error messages
					const errorMessages = reservationForm.querySelectorAll('.invalid-feedback');

					errorMessages.forEach((errorMessage) => {
						errorMessage.textContent = '';
					});

					// Remove the 'is-invalid' class from all input fields
					const inputFields = reservationForm.querySelectorAll('.form-control');
					inputFields.forEach((inputField) => {
						inputField.classList.remove('is-invalid');
					});

					if (data.errors)
					{
						// Display the new error messages and add error classes for invalid fields
						Object.keys(data.errors).forEach((fieldName) => {
							const errorMessage = data.errors[fieldName][0];
							const inputField = reservationForm.querySelector(`[name="${fieldName}"]`);
							const errorContainer = reservationForm.querySelector(`#${fieldName}Error`);

							if (inputField)
							{
								inputField.classList.add('is-invalid');
								errorContainer.textContent = errorMessage;
							}
						});
					}
					else
					{
						Toastify({
							text: 'Reservation done successfully',
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

						reservationForm.reset();
						localStorage.removeItem('selectedOption');

						// Delay the redirect
						setTimeout(() => {
							window.location.href = '/home';
						}, 3000);
					}
				})
				.catch(error => {
					console.error('Error submitting reservation:', error);
				});
			}
		});
	});
</script>
@endsection