<!DOCTYPE html>
<html
	lang="{{ str_replace('_', '-', app()->getLocale()) }}"
	class="light-style layout-menu-fixed"
>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Inventory Ops</title>

		{{-- Favicon --}}
		<link rel="icon" href="/assets/images/favicon/favicon.ico" sizes="any" />
		<link rel="icon" href="/assets/images/favicon/favicon.svg" type="image/svg+xml" />

		{{-- Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

		{{-- Icons --}}
		<link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />

		{{-- Core CSS --}}
		<link rel="stylesheet" href="{{ asset('assets/css/core.css') }}" class="template-customizer-core-css" />
		<link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" class="template-customizer-theme-css" />
		<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

		{{-- Vendors CSS --}}
		<link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
		<link rel="stylesheet" href="{{ asset('/assets/css/flatpickr.min.css') }}">

		{{-- Helpers --}}
		<script src="{{ asset('assets/js/helpers.js') }}"></script>
		<script src="{{ asset('assets/js/config.js') }}"></script>
		@stack('styles')
	</head>
	<body>
		{{-- Layout Wrapper --}}
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				{{-- Menu --}}
				@include('layouts.menu')
				{{-- / Menu --}}

				{{-- Layout Container --}}
				<div class="layout-page">
					{{-- Navbar --}}
					@include('layouts.navbar')
					{{-- / Navbar --}}

					{{-- Content Wrapper --}}
					<div class="content-wrapper">
						{{-- Content --}}
						<div class="container-xxl flex-grow-1 container-p-y">
							@yield('content')
						</div>
						{{-- / Content --}}

						{{-- Footer --}}
						@include('layouts.admin-footer')
						{{-- / Footer --}}
						<div class="content-backdrop fade"></div>
					</div>
					{{-- / Content Wrapper --}}
				</div>
				{{-- / Layout Container --}}
			</div>
			{{-- Overlay --}}
			<div class="layout-overlay layout-menu-toggle"></div>
		</div>
		{{-- / Layout Wrapper --}}

		{{-- Core JS --}}
		<script src="{{ asset('assets/libs/jquery/jquery.js') }}"></script>
		<script src="{{ asset('assets/libs/popper/popper.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
		<script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('/assets/js/flatpickr.js') }}"></script>
		<script src="{{ asset('assets/js/menu.js') }}"></script>

		{{-- Main JS --}}
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script async defer src="{{ asset('assets/js/buttons.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.tablednd.js') }}"></script>
		<script>
		$(document).ready(function()
		{
			function saveCategoryOrder() {
				var order = [];
				$("#searching_table tbody tr").each(function () {
					var categoryID = $(this).attr('data-category-id');
					var sortID = $(this).index() + 1;

					order.push({ categoryId: categoryID, sortId: sortID });
				});

				// Send an AJAX request to update the category order
				$.ajax({
					url: "/admin/settings/update-category-order",
					method: "POST",
					data: {
						_token: $('meta[name="csrf-token"]').attr("content"),
						order: order,
					},
					success: function (response) {
						if (response.success) {
							// console.log("Category order updated successfully");
						}
					},
					error: function (error) {
						console.error("Error updating category order");
					}
				});
			}

			function saveItemOrder() {
				var order = [];
				$("#searching_table tbody tr").each(function () {
					var itemID = $(this).attr('data-item-id');
					var sortID = $(this).index() + 1;

					order.push({ itemId: itemID, sortId: sortID });
				});

				// Send an AJAX request to update the category order
				$.ajax({
					url: "/admin/settings/update-item-order",
					method: "POST",
					data: {
						_token: $('meta[name="csrf-token"]').attr("content"),
						order: order,
					},
					success: function (response) {
						if (response.success) {
							// console.log("Category order updated successfully");
						}
					},
					error: function (error) {
						console.error("Error updating category order");
					}
				});
			}

			function search_table(value)
			{
				$('#searching_table tbody tr').each(function()
				{
					var found = 'false';
					$(this).each(function()
					{
						if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
						{
							found = 'true';
						}
					});

					if(found == 'true')
					{
						$(this).show();
					}
					else
					{
						$(this).hide();
					}
				});
			}

			$('#search').keyup(function()
			{
				search_table($(this).val());
			});

			$(".reorder-categories").tableDnD({
				onDrop: function () {
					saveCategoryOrder();
				}
			});

			$(".reorder-items").tableDnD({
				onDrop: function () {
					saveItemOrder();
				}
			});

			$(".date-selector").flatpickr();
		});
		</script>
		@stack('scripts')
	</body>
</html>
