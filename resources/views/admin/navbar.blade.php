@extends('layouts.admin')

@section('navbar')

				 
	 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
	<div class="scrollbar-inner">
	  <!-- Brand -->
	  <div class="sidenav-header  d-flex  align-items-center">
		<a class="navbar-brand" href="javascript:void(0)">
		  <img src="{{asset('/assets/dashboard_assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
		</a>
		<div class=" ml-auto ">
		  <!-- Sidenav toggler -->
		  <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
			<div class="sidenav-toggler-inner">
			  <i class="sidenav-toggler-line"></i>
			  <i class="sidenav-toggler-line"></i>
			  <i class="sidenav-toggler-line"></i>
			</div>
		  </div>
		</div>
	  </div>
	  
	   <div class="navbar-inner">

		<div class="collapse navbar-collapse" id="sidenav-collapse-main">

		  <ul class="navbar-nav">
			<li class="nav-item">
			<a href="/admin/dashboard" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
				<i class="ni ni-shop text-primary"></i>
				<span class="nav-link-text">Dashboards</span>
			  </a>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
				<i class="ni ni-align-left-2 text-default"></i>
				<span class="nav-link-text">STORES</span>
			  </a>
			  <div class="collapse" id="navbar-tables">
				<ul class="nav nav-sm flex-column">
				<li class="nav-item">
				<a href="/admin/new-shops-list" class="nav-link">
					  <span class="sidenav-mini-icon"> SL </span>
					  <span class="sidenav-normal">New Stores List </span>
					</a>
				  </li>
				  <li class="nav-item">
				  <a href="/admin/create-stores" class="nav-link">
					  <span class="sidenav-mini-icon"> CS </span>
					  <span class="sidenav-normal">  Create Store </span>
					</a>
				  </li>
				  <li class="nav-item">
				  <a href="/admin/shops-list" class="nav-link">
					  <span class="sidenav-mini-icon"> SL </span>
					  <span class="sidenav-normal"> Stores List </span>
					</a>
				  </li>
				</ul>
			  </div>
			</li>

		  </ul>
		  <hr className="my-3"/>

		</div>
	  </div>
	  
	</div>
  </nav>

	@endsection