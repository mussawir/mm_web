<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="{{ url('/admin/dashboard') }}" class="app-brand-link">
			<span class="app-brand-logo demo">
				<img src="{{ asset('/assets/images/favicon/favicon.svg') }}" class="navbar-brand-img" width="40" height="40" alt="MazaaMax">
			</span>
			<span class="app-brand-text demo menu-text fw-bolder ms-2">
				MazaaMax
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
		<li class="menu-item {{ (request()->is('admin/operators') || request()->is('admin/operators/*')) ? 'active' : '' }}">
			<a href="{{ url('/admin/operators') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user-circle"></i>
				<div data-i18n="Operators">Operators</div>
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
		<li class="menu-item {{ request()->is('admin/vendor-types') ? 'active' : '' }}">
			<a href="{{ url('/admin/vendor-types') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user-circle"></i>
				<div data-i18n="Vendor Types">Vendor Types</div>
			</a>
		</li>
		@endcan

		@can('operator')
		<li class="menu-item {{ request()->is('admin/vendors') ? 'active' : '' }}">
			<a href="{{ url('/admin/vendors') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user-circle"></i>
				<div data-i18n="Vendors">Vendors</div>
			</a>
		</li>
		<li class="menu-item {{ in_array('settings', request()->segments()) ? 'active' : '' }}">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class='menu-icon tf-icons bx bx-cog'></i>
				<div data-i18n="Settings">Settings</div>
			</a>

			<ul class="menu-sub">
				{{-- <li class="menu-item {{ request()->is('admin/settings/reorder') ? 'active' : '' }}">
					<a href="{{ url('/admin/settings/reorder') }}" class="menu-link">
						<div data-i18n="Reordering">
							Reordering
						</div>
					</a>
				</li> --}}
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

		@can('vendor')
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
				@can('vendor')
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
				@endcan
				<li class="menu-item {{ request()->is('admin/dashboard/order/history') ? 'active' : '' }}">
					<a href="/admin/dashboard/order/history" class="menu-link">
						<div data-i18n="History">History</div>
					</a>
				</li>
			</ul>
		</li>
		@endcan
	</ul>
</aside>
