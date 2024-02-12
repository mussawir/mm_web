<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasNavbarLabel">
			Menu
		</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="navbar-nav ms-auto text-lg-start text-center me-lg-5 mb-2 mb-lg-0 gap-lg-5">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="/home">
					Home
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="/about-us">
					About Us
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="/contact-us">
					Contact Us
				</a>
			</li>
		</ul>
		<ul class="nav nav-pills nav-fill align-items-center gap-2 mt-0 me-2">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle bg-light rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fa-solid fa-user fs-6" aria-hidden="true" style="color: #e85d04"></i>
				</a>

				<ul class="dropdown-menu dropdown-menu-end">
					@if (Auth::guard('customer')->check())
					<li>
						<a href="{{ route('customer.orders', Auth::guard('customer')->user()->id) }}" class="dropdown-item">
							My Orders
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="dropdown-item">
							Profile
						</a>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<a
								href="{{ route('logout') }}"
								onclick="event.preventDefault(); this.closest('form').submit();"
								class="dropdown-item"
							>
								<i class="bx bx-power-off me-2"></i>
								<span class="align-middle">
									Log Out
								</span>
							</a>
						</form>
					</li>
					@else
					<li>
						<a href="/customer/login" class="dropdown-item fw-semibold">
							Login
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" class="dropdown-item fw-semibold">
							Sign Up
						</a>
					</li>
					@endif
				</ul>
			</li>

			<li class="nav-item">
				<a
					href="javascript:void(0)"
					class="nav-link position-relative bg-light rounded-pill"
					data-bs-toggle="offcanvas"
					data-bs-target="#offcanvasCart"
					aria-controls="offcanvasCart"
					aria-label="Open Cart Offcanvas"
				>
					<i class="fa-solid fa-bag-shopping fs-6" aria-hidden="true" style="color: #e85d04"></i>
					<span class="position-absolute top-0 start-100 translate-middle badge rounded-4 bg-warning text-dark">
						{{ $cartItems }}
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>