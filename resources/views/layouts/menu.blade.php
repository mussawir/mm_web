<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="{{ url('/admin/dashboard') }}" class="app-brand-link">
			<span class="app-brand-logo demo">
				<img src="{{ asset('/assets/images/favicon/favicon.svg') }}" class="navbar-brand-img" width="40" height="40" alt="Inventory Ops">
			</span>
			<span class="app-brand-text demo menu-text fw-bolder ms-2">
				Inventory Ops
			</span>
		</a>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>
	<ul class="menu-inner py-1 gap-2">
		{{-- Dashboard --}}
		<li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
			<a href="{{ url('/admin/dashboard') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Dashboard">Dashboard</div>
			</a>
		</li>

		@can('admin')
			<li class="menu-item {{ (request()->is('admin/approve-customers')) ? 'active' : '' }}">
				<a href="{{ url('/admin/approve-customers') }}" class="menu-link">
					<i class="menu-icon tf-icons bx bxs-user-account"></i>
					<div data-i18n="Approve Customers">Approve Customers</div>
				</a>
			</li>
			<li class="menu-item {{ (request()->is('admin/operators') || request()->is('admin/operators/*')) ? 'active' : '' }}">
				<a href="{{ url('/admin/operators') }}" class="menu-link">
					<i class="menu-icon tf-icons bx bxs-truck"></i>
					<div data-i18n="Suppliers">Suppliers</div>
				</a>
			</li>
			<li class="menu-item {{ (request()->is('admin/categories') || request()->is('admin/categories/*')) ? 'active' : '' }}">
				<a href="{{ url('/admin/categories') }}" class="menu-link">
					<i class="menu-icon tf-icons bx bxs-category"></i>
					<div data-i18n="Categories">Categories</div>
				</a>
			</li>
			<li class="menu-item {{ request()->is('admin/cities') ? 'active' : '' }}">
				<a href="{{ url('/admin/cities') }}" class="menu-link">
					<i class="menu-icon tf-icons bx bxs-city"></i>
					<div data-i18n="Cities">Cities</div>
				</a>
			</li>
			<li class="menu-item {{ request()->is('admin/inventory-mapping') ? 'active' : '' }}">
				<a href="{{ url('/admin/inventory-mapping') }}" class="menu-link">
					<i class="menu-icon tf-icons bx bxs-user-circle"></i>
					<div data-i18n="Inventory Mapping">Inventory Mapping</div>
				</a>
			</li>
		@endcan

		@can('supplier')
			{{-- Orders --}}
			<li class="menu-item {{ (in_array('order', request()->segments())) ? 'active' : '' }}">
				<a href="javascript:void(0);" class="menu-link menu-toggle">
					<i class="menu-icon tf-icons bx bxs-basket"></i>
					<div data-i18n="Orders">Orders</div>
				</a>

				<ul class="menu-sub">
					<li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
						<a href="{{ url('/admin/dashboard') }}" class="menu-link">
							<div data-i18n="New">New</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('admin/dashboard/orders/approved') ? 'active' : '' }}">
						<a href="{{ url('/admin/dashboard/orders/approved') }}" class="menu-link">
							<div data-i18n="Approved Orders">
								Approved Orders
							</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('admin/dashboard/orders/preparation') ? 'active' : '' }}">
						<a href="{{ url('/admin/dashboard/orders/preparation') }}" class="menu-link">
							<div data-i18n="Preparation Orders">
								Preparation Orders
							</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('admin/dashboard/orders/prepared') ? 'active' : '' }}">
						<a href="{{ url('/admin/dashboard/orders/prepared') }}" class="menu-link">
							<div data-i18n="Prepared Orders">
								Prepared Orders
							</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('admin/dashboard/order/history') ? 'active' : '' }}">
						<a href="/admin/dashboard/order/history" class="menu-link">
							<div data-i18n="History">History</div>
						</a>
					</li>
				</ul>
			</li>
			{{-- Items --}}
			<li class="menu-item {{ (in_array('item', request()->segments())) ? 'active' : '' }}">
				<a href="javascript:void(0);" class="menu-link menu-toggle">
					<i class="menu-icon tf-icons bx bxs-basket"></i>
					<div data-i18n="Items">Items</div>
				</a>

				<ul class="menu-sub">
					<li class="menu-item {{ request()->is('/admin/vendors/item-list/' . Auth::guard("admin")->user()->id) ? 'active' : '' }}">
						<a href="{{ url('/admin/vendors/item-list/' . Auth::guard('admin')->user()->id) }}" class="menu-link">
							<div data-i18n="New">Item List</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('/admin/addnew/item/' . Auth::guard('admin')->user()->id) ? 'active' : '' }}">
						<a href="{{ url('/admin/addnew/item/' . Auth::guard('admin')->user()->id) }}" class="menu-link">
							<div data-i18n="Approved Orders">
								New Item
							</div>
						</a>
					</li>
				</ul>
			</li>
			{{-- <li class="menu-item {{ request()->is('admin/vendors') ? 'active' : '' }}">
				<a href="{{ url('/admin/vendors') }}" class="menu-link">
					<i class="menu-icon tf-icons bx bxs-user-circle"></i>
					<div data-i18n="Vendors">Vendors</div>
				</a>
			</li> --}}
			<li class="menu-item {{ in_array('settings', request()->segments()) ? 'active' : '' }}">
				<a href="javascript:void(0);" class="menu-link menu-toggle">
					<i class='menu-icon tf-icons bx bx-cog'></i>
					<div data-i18n="Settings">Settings</div>
				</a>

				<ul class="menu-sub">
					<li class="menu-item {{ request()->is('admin/settings/show-old-cart') ? 'active' : '' }}">
						<a href="{{ url('/admin/settings/show-old-cart') }}" class="menu-link">
							<div data-i18n="Clean Old Cart">
								Clean Old Cart
							</div>
						</a>
					</li>
				</ul>
			</li>
		@endcan
	</ul>
</aside>
