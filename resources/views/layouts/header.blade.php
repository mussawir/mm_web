<div class="header-section sticky-top">
	<div class="navbar-slot" id="rdp-header">
		<section class="bg-white d-flex position-relative w-100 flex-column bds-c-navbar" style="box-shadow:0px 0px 24px 0px rgba(0,0,0,0.16);">
			<header class="bds-c-navbar__header d-flex flex-row align-items-center">
				<nav class="bds-c-navbar__brand d-flex flex-row align-items-center">
					<a href="/" aira-label="Home">
						<span aria-label="mazaamax" class="d-flex justify-content-center" style="flex-shrink:0;line-height:0;align-items:flex-end;gap:8px;">
							<img
								src="/assets/images/avatars/mazamax.svg"
								class="w-50 img-fluid"
								alt="mazaamax">
						</span>
					</a>
				</nav>
				<div class="bds-c-navbar__center--top d-flex flex-row">
					<div class="bds-c-navbar__center--filler d-flex"></div>
					<div class="bds-c-navbar__center d-flex flex-row align-items-center justify-content-center">
						<div class="where-wrapper">
							<div class="location-header-display">
								<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-default">
									<button class="bds-c-btn bds-c-btn-text bds-c-btn--size-small bds-is-idle bds-c-btn--layout-default bds-c-btn--remove-side-spacing zi-surface-base location-search-button location">
										<span class="bds-c-btn__idle-content">
											<span class="bds-c-btn__idle-content__label">
												<span>
													<div class="d-flex align-items-center p-2 gap-1">
														<span class="d-flex flex-column address-label-icon">
															<i class="fa-solid fa-location-dot"></i>
														</span>
														<span class="header-order-button-content cl-interaction-primary f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family d-flex gap-1">
															<span class="cl-neutral-primary f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family">
																Current Address:
															</span>
															<span class="place"></span>
															<span class="address-label-highlighted-header cl-neutral-primary f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family city d-block">
															</span>
														</span>
													</div>
												</span>
											</span>
										</span>
									</button>
								</div>
							</div>
						</div>
						<div class="when-component-wrapper webfound-refresh">
							<div class="header-button mw-100">
	
							</div>
						</div>
					</div>
					<div class="bds-c-navbar__center--filler d-flex"></div>
				</div>
				<div class="bds-c-navbar__right d-flex">
					@if (Auth::guard('customer')->check())
					<div class="account-menu">
						<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-default">
							<button class="bds-c-btn bds-c-btn-text bds-c-btn--size-small bds-is-idle bds-c-btn--layout-default bds-c-btn--remove-side-spacing zi-surface-base bds-c-menu-selector dropdown-toggle" type="button" data-bs-toggle="dropdown">
								<span class="bds-c-btn__idle-content">
									<span class="bds-c-btn__idle-content__label">
										<span>
											<div class="bds-c-menu-selector__container">
												<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="personal-icon">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M12 11.5C13.933 11.5 15.5 9.933 15.5 8C15.5 6.067 13.933 4.5 12 4.5C10.067 4.5 8.50001 6.067 8.50001 8C8.50001 9.933 10.067 11.5 12 11.5ZM10.0566 14.2045C10.679 14.071 11.33 14.0001 12 14C12.0003 14 12.0007 14 12.001 14C12.6709 14 13.3218 14.0708 13.9442 14.2042C17.1008 14.881 19.5251 17.1688 19.9907 20.0041C20.0802 20.5491 19.6241 21 19.0718 21H4.93021C4.37792 21 3.92177 20.5491 4.01127 20.0041C4.47684 17.1692 6.90063 14.8815 10.0566 14.2045ZM10.1743 12.6562C8.31584 11.9269 7.00001 10.1171 7.00001 8C7.00001 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.1169 15.6845 11.9265 13.8263 12.656C13.2609 12.8779 12.6452 12.9999 12.001 13C12.0007 13 12.0003 13 12 13C11.3557 13 10.7399 12.8781 10.1743 12.6562ZM18.3216 19.5C17.5644 17.2951 15.1351 15.5 12.001 15.5C8.86687 15.5 6.43759 17.2951 5.6804 19.5H18.3216Z"></path>
												</svg>
												<div class="cl-interaction-secondary-hover f-ribbon-base-font-size fw-ribbon-base-font-weight lh-ribbon-base-line-height ff-ribbon-base-font-family mx-xxs">
													{{ Auth::guard('customer')->user()->name }}
												</div>
												<div class="bds-c-menu-selector__chevron">
													<svg aria-hidden="true" focusable="false" class="fl-interaction-primary" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M18.5303 8.44352C18.7966 8.70977 18.8208 9.12643 18.603 9.42006L18.5304 9.50418L12.3286 15.7069C12.1728 15.8628 11.9204 15.8632 11.764 15.708L5.47165 9.46235C5.17767 9.17055 5.1759 8.69568 5.4677 8.4017C5.73298 8.13445 6.14955 8.10869 6.44397 8.32545L6.52835 8.39775L11.7602 13.5894C11.9165 13.7446 12.169 13.7441 12.3248 13.5883L17.4696 8.44361C17.7359 8.17732 18.1525 8.15308 18.4462 8.37091L18.5303 8.44352Z"></path>
													</svg>
												</div>
											</div>
										</span>
									</span>
								</span>
							</button>
							<ul role="menu" class="dropdown-menu account-menu__list">
								<li role="presentation">
									<a
										role="menu-item"
										href="/my-orders/{{ Auth::guard('customer')->user()->id }}"
										class="dropdown-item"
									>
										<div class="box-flex align-items-center justify-content-center">
											<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path d="M13.1 14H13V14.01H7.65C7.28 14.06 7 14.37 7 14.75C7 15.13 7.28 15.44 7.65 15.49H13.1C13.47 15.44 13.75 15.13 13.75 14.75C13.75 14.37 13.47 14.06 13.1 14Z"></path>
												<path d="M16.1 14H16V14.01H15.65C15.28 14.06 15 14.37 15 14.75C15 15.13 15.28 15.44 15.65 15.49H16.1C16.47 15.44 16.75 15.13 16.75 14.75C16.75 14.37 16.47 14.06 16.1 14Z"></path>
												<path d="M16.33 10.49H16.23V10.5H7.66C7.29 10.55 7 10.86 7 11.24C7 11.62 7.28 11.93 7.66 11.98H16.33C16.7 11.93 16.99 11.62 16.99 11.24C16.99 10.86 16.71 10.55 16.33 10.49Z"></path>
												<path d="M16.33 6.97998H16.23V6.99998H7.66C7.29 7.05998 7 7.34998 7 7.72998C7 8.10998 7.28 8.41998 7.66 8.46998H16.33C16.7 8.41998 16.99 8.10998 16.99 7.72998C16.99 7.34998 16.71 7.03998 16.33 6.97998Z"></path>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M16.62 19.3C16.45 19.21 16.24 19.25 16.12 19.4L14.91 20.86C14.77 21.02 14.53 21.05 14.36 20.92L12.24 19.33C12.1 19.22 11.9 19.22 11.76 19.33L9.64 20.92C9.47 21.05 9.23 21.02 9.09 20.86L7.88 19.4C7.76 19.25 7.55 19.21 7.38 19.3L4.59 20.82C4.4 20.93 4.15 20.85 4.05 20.66C4.02 20.6 4 20.54 4 20.47V5C4 3.9 4.9 3 6 3H18C19.1 3 20 3.9 20 5V20.47C20 20.69 19.82 20.87 19.6 20.87C19.53 20.87 19.47 20.85 19.41 20.82L16.62 19.3ZM17.3218 17.9743C16.5429 17.5619 15.5472 17.7284 14.9597 18.4493L14.4254 19.094L13.1485 18.1364C12.4718 17.6179 11.5282 17.6179 10.8515 18.1364L9.57461 19.094L9.0403 18.4493C8.45283 17.7284 7.45715 17.5619 6.67817 17.9743L6.67025 17.9785L5.5 18.6161V5C5.5 4.72843 5.72843 4.5 6 4.5H18C18.2716 4.5 18.5 4.72843 18.5 5V18.6161L17.3297 17.9785L17.3218 17.9743Z"></path>
											</svg>
										</div>
										<div class="f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family">
											<span>Orders</span>
										</div>
									</a>
								</li>
								<li role="presentation">
									<a
										role="menu-item"
										href="/account"
										class="dropdown-item"
									>
										<div class="box-flex align-items-center justify-content-center">
											<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M12 11.5C13.933 11.5 15.5 9.933 15.5 8C15.5 6.067 13.933 4.5 12 4.5C10.067 4.5 8.50001 6.067 8.50001 8C8.50001 9.933 10.067 11.5 12 11.5ZM10.0566 14.2045C10.679 14.071 11.33 14.0001 12 14C12.0003 14 12.0007 14 12.001 14C12.6709 14 13.3218 14.0708 13.9442 14.2042C17.1008 14.881 19.5251 17.1688 19.9907 20.0041C20.0802 20.5491 19.6241 21 19.0718 21H4.93021C4.37792 21 3.92177 20.5491 4.01127 20.0041C4.47684 17.1692 6.90063 14.8815 10.0566 14.2045ZM10.1743 12.6562C8.31584 11.9269 7.00001 10.1171 7.00001 8C7.00001 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.1169 15.6845 11.9265 13.8263 12.656C13.2609 12.8779 12.6452 12.9999 12.001 13C12.0007 13 12.0003 13 12 13C11.3557 13 10.7399 12.8781 10.1743 12.6562ZM18.3216 19.5C17.5644 17.2951 15.1351 15.5 12.001 15.5C8.86687 15.5 6.43759 17.2951 5.6804 19.5H18.3216Z"></path>
											</svg>
										</div>
										<div class="f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family">
											<span>Profile</span>
										</div>
									</a>
								</li>
								<li><hr class="dropdown-divider"></li>
								<li role="presentation">
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<a
											href="{{ route('logout') }}"
											onclick="event.preventDefault(); this.closest('form').submit();"
											role="menu-item"
										>
											<div class="box-flex align-items-center justify-content-center">
												<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M6 3.75C4.53747 3.75 3.3416 4.8917 3.25502 6.33248L3.25 6.5V17.5C3.25 18.9625 4.3917 20.1584 5.83248 20.245L6 20.25H12C13.4625 20.25 14.6584 19.1083 14.745 17.6675L14.75 17.5V16.9969C14.75 16.5827 14.4142 16.2469 14 16.2469C13.6203 16.2469 13.3065 16.5291 13.2568 16.8952L13.25 16.9969V17.5C13.25 18.1472 12.7581 18.6795 12.1278 18.7435L12 18.75H6C5.35279 18.75 4.82047 18.2581 4.75645 17.6278L4.75 17.5V6.5C4.75 5.85279 5.24187 5.32047 5.87219 5.25645L6 5.25H12C12.6472 5.25 13.1795 5.74187 13.2435 6.37219L13.25 6.5V9.06042C13.25 9.47463 13.5858 9.81042 14 9.81042C14.3797 9.81042 14.6935 9.52827 14.7432 9.16219L14.75 9.06042V6.5C14.75 5.03747 13.6083 3.8416 12.1675 3.75502L12 3.75H6ZM17.3234 9.39702L17.4075 9.46963L20.6328 12.6944C20.7884 12.85 20.7892 13.1019 20.6345 13.2584L20.4805 13.4143C20.4261 13.4963 20.3561 13.5669 20.2746 13.6219L17.3876 16.5284C17.0958 16.8223 16.6209 16.8241 16.3269 16.5323C16.0597 16.267 16.0339 15.8505 16.2507 15.556L16.323 15.4716L17.8622 13.9204C17.9011 13.8812 17.9008 13.8179 17.8616 13.779C17.8429 13.7604 17.8176 13.75 17.7912 13.75H8.85527C8.44105 13.75 8.10527 13.4142 8.10527 13C8.10527 12.6203 8.38742 12.3065 8.7535 12.2568L8.85527 12.25H17.8258C17.881 12.25 17.9258 12.2052 17.9258 12.15C17.9258 12.1235 17.9152 12.098 17.8965 12.0793L16.3469 10.5304C16.0806 10.2641 16.0564 9.84747 16.2742 9.55384L16.3468 9.46971C16.6131 9.20342 17.0297 9.17919 17.3234 9.39702Z"></path>
												</svg>
											</div>
											<div class="f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family">
												<span>Logout</span>
											</div>
										</a>
									</form>
								</li>
							</ul>
						</div>
					</div>
					@else
					<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-default">
						<a href="/customer/login" class="bds-c-btn bds-c-btn-secondary bds-c-btn--size-small bds-is-idle bds-c-btn--layout-default zi-surface-base" role="button">
							<span class="bds-c-btn__idle-content">
								<span class="bds-c-btn__idle-content__label">
									<span>Log in</span>
								</span>
							</span>
						</a>
					</div>
					<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-default">
						<a href="/customer/login" class="bds-c-btn bds-c-btn-primary bds-c-btn--size-small bds-is-idle bds-c-btn--layout-default zi-surface-base" role="button">
							<span class="bds-c-btn__idle-content">
								<span class="bds-c-btn__idle-content__label">
									<span>Sign up</span>
								</span>
							</span>
						</a>
					</div>
					@endif
				</div>
				<div class="bds-c-navbar__right-icons d-flex">
					<div class="bds-c-btn-cursor">
						<a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart" aria-label="Open Cart Offcanvas" class="bds-c-btn bds-c-btn-circular bds-c-btn-circular-basic bds-c-btn-circular--size-large zi-surface-base bds-c-navbar__cart" role="button">
							<svg aria-hidden="true" focusable="false" class="fl-brand-primary" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0021 2C14.5418 2 16.4241 3.6512 16.5538 6.15854H19.8491C20.4014 6.15854 20.8491 6.60625 20.8491 7.15854C20.8491 7.20585 20.8457 7.25311 20.8391 7.29996L19.1248 19.1414C19.0544 19.6341 18.6325 20 18.1348 20H5.86942C5.37176 20 4.94984 19.6341 4.87947 19.1414L3.16518 7.29996C3.08707 6.75322 3.46697 6.24669 4.0137 6.16859C4.06055 6.16189 4.10781 6.15854 4.15513 6.15854L7.36129 6.16397C7.49108 3.65663 9.46248 2 12.0021 2ZM17.5607 16.25H6.44235C6.22143 16.25 6.04235 16.4291 6.04235 16.65C6.04235 16.669 6.04369 16.6879 6.04638 16.7067L6.25397 18.1567C6.28217 18.3537 6.45092 18.5 6.64993 18.5H17.3533C17.5523 18.5 17.7211 18.3537 17.7492 18.1566L17.9567 16.7066C17.988 16.488 17.836 16.2853 17.6174 16.254C17.5986 16.2513 17.5797 16.25 17.5607 16.25ZM18.8109 7.65854H5.19233C4.97142 7.65854 4.79233 7.83762 4.79233 8.05854C4.79233 8.32251 4.79367 8.09637 4.79635 8.11511L5.71793 14.4066C5.74609 14.6036 5.91486 14.75 6.11391 14.75H17.8891C18.0882 14.75 18.2569 14.6036 18.2851 14.4066L19.2069 8.11513C19.2381 7.89643 19.0862 7.69381 18.8675 7.66256C18.8487 7.65988 18.8298 7.65854 18.8109 7.65854ZM12.0021 3.40323C10.4163 3.40323 9.15495 4.32251 8.91234 5.80175C8.88507 5.96802 8.98943 6.12701 9.15495 6.15854C9.17377 6.16212 9.19289 6.16392 9.21204 6.1639L14.7134 6.15847C14.8772 6.15843 15.0099 6.02566 15.0099 5.86189C15.0099 5.84361 14.9631 5.82209 15.0049 5.80742C14.655 4.32251 13.5918 3.40323 12.0021 3.40323Z"></path>
							</svg>
							@php
								$dealsCount = count(session()->get('cart.deal', []));
								$itemsCount = count(session()->get('cart.item', []));
								$cartItems = (int) ($dealsCount + $itemsCount);
							@endphp
							@if ($cartItems)
							<div class="bds-c-navbar__cart__item ml-xxs">
								{{ $cartItems }}
							</div>
							@endif
						</a>
					</div>
				</div>
			</header>
			@if(request()->is('/') || request()->is('home'))
			<div class="box-flex bds-c-navbar__bottom">
				<div class="bds-c-tabs vertical-switcher-tabs">
					<div class="bds-c-tabs__container">
						<ul class="bds-c-tabs__list align-items-center gap-2" role="tablist">
							<li class="bds-c-tab" x-on:click="selectedTab = 'all', selectedType='food'" :class="{ 'is-selected': selectedTab === 'all' }" role="presentation">
								<button role="tab">
									<div class="bds-c-tab__icon">
										<x-icon name="food"/>
									</div>
									<span class="bds-c-tab__label">
										All
									</span>
								</button>
							</li>
							{{-- <li class="bds-c-tab" x-on:click="selectedTab = 'food',selectedType='food'" :class="{ 'is-selected': selectedTab === 'food' }" role="presentation">
								<button role="tab">
									<div class="bds-c-tab__icon">
										<x-icon name="food"/>
									</div>
									<span class="bds-c-tab__label">
										Food
									</span>
								</button>
							</li>
							<li class="bds-c-tab"  x-on:click="selectedTab = 'shop',selectedType='shop'" :class="{ 'is-selected': selectedTab === 'shop' }" role="presentation">
								<button role="tab">
									<div class="bds-c-tab__icon">
										<x-icon name="shop"/>
									</div>
									<span class="bds-c-tab__label" id="rlp-vertical-switcher__tab-1-label">
										Shops
									</span>
								</button>
							</li> --}}
							@if ($vendorTypes->count())
							@foreach ($vendorTypes as $vendorType)
							<li class="bds-c-tab"  x-on:click="selectedTab = '{{ strtolower($vendorType->type_name) }}',selectedType = '{{ $vendorType->is_food ? 'food' : 'shop' }}'" :class="{ 'is-selected': selectedTab === '{{ strtolower($vendorType->type_name) }}' }" role="presentation">
								<button role="tab">
									<div class="bds-c-tab__icon">
										{{-- <x-icon name="shop"/> --}}
									</div>
									<span class="bds-c-tab__label" id="rlp-vertical-switcher__tab-1-label">
										{{ $vendorType->type_name }}
									</span>
								</button>
							</li>
							@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
			@endif
		</section>
	</div>
</div>

{{-- @include('offcanvas.offcanvas-menu') --}}
@include('offcanvas.offcanvas-cart')
