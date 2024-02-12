@extends('layouts.front')

@section('content')
<h1 class="Galleryy">Gallery</h1>
<div class="container">
	<div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G1.jpg')}}" data-target="#indicators" data-slide-to="0"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G2.jpg')}}" data-target="#indicators" data-slide-to="1"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G3.jpg')}}" data-target="#indicators" data-slide-to="2"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G4.jpg')}}" data-target="#indicators" data-slide-to="3"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G5.jpg')}}" data-target="#indicators" data-slide-to="3"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G6.jpg')}}" data-target="#indicators" data-slide-to="4"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G7.jpg')}}" data-target="#indicators" data-slide-to="4"/>
		</div>
		<div class="col-12 col-md-6 col-lg-3">
			<img src="{{asset ('/front/images/newgallery_images/G8.jpg')}}" data-target="#indicators" data-slide-to="4"/>
		</div>
	</div>
</div>
@endsection