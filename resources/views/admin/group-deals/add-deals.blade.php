@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	<span class="text-muted fw-light">
		Add New Group Deal /
	</span>
	Deals
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        {{-- Search Input --}}
                        <div class="mb-3">
                            <label for="search" class="form-label">
                                Search
                            </label>
                            <input type="text" class="form-control" id="search">
                        </div>
                    </div>
                </div>
				<form method="POST" action="{{ route('group-deals.add-deals') }}">
					@csrf
                    <input type="hidden" name="branch" value="{{ $branch }}"/>
					<input type="hidden" name="selected_deals" id="selected-deals-input">
					<div class="row mb-3">
						<div class="col-md-6">
							<h5>Select Deals:</h5>
							<div id="deals-container">
								@foreach ($deals as $deal)
								<div class="form-check form-switch mb-2 deal">
									<input class="form-check-input deal-switch" type="checkbox" id="deal-switch-{{ $deal->id }}" value="{{ $deal->id }}">
									<label class="form-check-label" for="deal-switch-{{ $deal->id }}">
										{{ $deal->name }}
									</label>
								</div>
								@endforeach
							</div>
						</div>
						<div class="col-md-6">
							<h5 class="text-end">Selected Deals:</h5>
							<div id="selected-deals-container"></div>
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<a class="btn btn-secondary" href="{{ route('group-deals.create', $branch) }}">
								Previous
							</a>
							<button type="submit" class="btn btn-primary">
								Save
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
	$(document).ready(function() {
		var selectedDeals = [];

		// Function to generate HTML markup for selected items
		function generateSelectedDealsHtml() {
			var selectedDealsHtml = '';
			$.each(selectedDeals, function(index, deal) {
				selectedDealsHtml += '<div class="d-flex justify-content-end  align-items-center gap-3 mb-4 selected-deal">'
					+ '<p class="mb-0">' + deal.name + '</p>' + '<button class="btn btn-sm btn-danger remove-deal" data-deal-id="' + deal.id + '">Remove</button>'+ '</div>';
			});
			return selectedDealsHtml;
		}

		// Function to update the hidden input value with selected items data
		function updateSelectedDealsInput() {
			$('#selected-deals-input').val(JSON.stringify(selectedDeals));
		}

		// Function to update the selected deals hidden input
		function updateSelectedDeals() {
			// Iterate over the deal switches
			$('.deal-switch:checked').each(function() {
				var dealID = $(this).closest('input[type="checkbox"]').val();

				// Find the item in the selectedDeals array
				var selectedDeal = selectedDeals.find(function(deal) {
					return deal.id === dealID;
				});

				if (selectedDeal)
				{}
				else
				{
					// Create a new item and add it to the selectedItems array
					selectedDeal = {
						id: dealID,
						name: $.trim($(this).parent().find('.form-check-label').text())
					};
					selectedDeals.push(selectedDeal);
				}
			});
			var selectedDealsHtml = generateSelectedDealsHtml();
			$('#selected-deals-container').html(selectedDealsHtml);

			// Update the hidden input value
			updateSelectedDealsInput();
		}

		// Event handler for the "remove" button
		$(document).on('click', '.remove-deal', function(event) {
			event.preventDefault();

			var dealID = $(this).data('deal-id').toString();

			// Remove the deal from the selectedDeals array
			selectedDeals = selectedDeals.filter(function(deal) {
				return deal.id !== dealID;
			});

            $('#deal-switch-' + dealID).prop('checked', false);

			// Generate HTML markup for selected deals
			var selectedDealsHtml = generateSelectedDealsHtml();
			$('#selected-deals-container').html(selectedDealsHtml);

			// Update the hidden input value
			updateSelectedDealsInput();
		});

		// Load items on category change
		$('.deal-switch').on('change', function() {
			updateSelectedDeals();
		});

		$('#search').on('input', function() {
			var searchValue = $(this).val().toLowerCase();
			$('.deal').each(function()
			{
				var dealName = $(this).find('.form-check-label').text().toLowerCase();
				if (dealName.indexOf(searchValue) !== -1)
				{
					$(this).show();
				}
				else
				{
					$(this).hide();
				}
			});
		});

		// Prevent form submission when hitting Enter key on the search input field
		$('#search').on('keydown', function(event) {
			if (event.keyCode === 13) {
				event.preventDefault();
				return false;
			}
		});
	});
</script>
@endsection
