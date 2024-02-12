@extends('layouts.front')
@section('css')
{{-- <style>
.container {
    max-width: 1100px !important;
}
</style> --}}
@endsection
@section('content')

            <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Rider<span> Registration</span></h5>
                            <form action="{{url('/rider/register')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
            <div class="col-md-6" {{ $errors->has('name') ? 'has-error' : '' }}>

                <label  class="form-label">Name</label>

                <input type="text" class="form-control" placeholder="Enter Shop Name" name="name" value="zqwer" value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>

            <div class="col-md-6" {{ $errors->has('city') ? 'has-error' : '' }}>
                <label  class="form-label">City</label>

                <input type="text" class="form-control" placeholder="Enter Sale Type" name="city" value="z" value="{{ old('city') }}">
                <span class="text-danger">{{ $errors->first('city') }}</span>
            </div>

            <div class="col-md-6" {{ $errors->has('address') ? 'has-error' : '' }}>
                <label  class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Enter Address" name="address" value="z"  value="{{ old('address') }}">
                <span class="text-danger">{{ $errors->first('address') }}</span>
            </div>

            <div class="col-md-6" {{ $errors->has('phone_number') ? 'has-error' : '' }}>
                <label  class="form-label">Phone Number</label>

                <input type="number" class="form-control" placeholder="Enter Phone Number" name="phone_number" value="12345678912" value="{{ old('phone_number') }}">
                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
@section('js')
<script>
    AOS.init({
        duration: 1000
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:true
        },
        1000:{
            items:2,
            nav:true,
            loop:false
        }
    }
})

</script>
@endsection
