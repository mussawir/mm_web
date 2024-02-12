<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
	public function index()
	{
		// $gallery = Gallery::orderby('position', 'asc')->get();
		// $banner = Banner::orderby('position', 'asc')->get();
		return view('home');
		// return redirect('/admin/login');
	}

	public function whyJoinUs()
	{
		return view('pages.why-join-us');
	}

	public function testimonials()
	{
		return view('pages.testimonials');
	}

	public function aboutUs()
	{
		return view('pages.about-us');
	}

	public function gallery()
	{
		return view('gallery');
	}

	public function contactUs()
	{
		return view('pages.contact-us');
	}

	public function privacyPolicy()
	{
		return view('pages.privacy-policy');
	}
}
