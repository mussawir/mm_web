<footer class="footer mt-auto py-3">
	<button class="back-to-top" id="myBtn" title="Go to top">
		<i class="fa-solid fa-chevron-up small"></i>
	</button>
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<a href="{{ route('home') }}" class="d-flex align-items-center gap-2">
					<img
						src="{{ asset('assets/images/avatars/mazamax.svg') }}"
						class="w-25 img-fluid"
						alt="Mazaa Max"
						style="filter:grayscale(1)"
					/>
				</a>
			</div>
			<div class="col-lg-3"></div>
			<div class="col-lg-3 col-xs-12 justidy-content-end d-flex">
				<div class="right-text-content justify-content-end d-flex">
					<ul class="social-icons">
						<li>
							<a href="javascript:void(0);">
								<i class="fa-brands fa-facebook"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<i class="fa-brands fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<i class="fa-brands fa-linkedin"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<i class="fa-brands fa-instagram"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<hr>

		<div class="row">
			<div class="col-lg-3">
				<p class="text-secondary">© {{ now()->format('Y') }} MazaaMax</p>
			</div>
			<div class="col-lg-3">
				<ul class="direction-column">
					<li>
						<a href="javascript:void(0)">
							<p>Press Help Center</p>
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<p>Refunds with MazaaMax</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>MazaaMax User Account Terms and Conditions</p>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-3">
				<ul class="direction-column">
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Terms And Condition</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Privacy and Policy</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Security</p>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-3">
				<ul class="direction-column">
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Download MazaaMax Apps</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Human Rights Policy</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
