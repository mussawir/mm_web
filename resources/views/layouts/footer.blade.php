<footer class="footer mt-auto py-3">
	<button class="back-to-top" id="myBtn" title="Go to top">
		<i class="fa-solid fa-chevron-up small"></i>
	</button>
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<a href="{{ route('home') }}" class="d-flex align-items-center gap-2">
					<img src="{{ asset('assets/images/avatars/mazamax.svg') }}" width="40" alt="Maza Max" style="filter:grayscale(1)">
					<p class="ml-2 mb-0 fs-6 fw-bold">Maza Max</p>
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
				<p class="text-secondary">© {{ now()->format('Y') }} MazaMax</p>
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
							<p>Refunds with MazaMax</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>MazaMax User Account Terms and Conditions</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Terms And Condition</p>
							<p>Privacy and Policy</p>
						</a>
					</li>
					<li class="d-flex">
						<a href="javascript:void(0)">
							<p>Security</p>
							<p>Download MazaMax Apps</p>
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
