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
                            <h5 class="card-title">Shop<span>Registration</span></h5>
                            <form action="{{url('/shop/register')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-6" {{ $errors->has('owner_name') ? 'has-error' : '' }}>
                <label class="form-label">Shop Owner</label>

                <input type="text" class="form-control" placeholder="Enter Shop Owner Name" name="owner_name"  value="{{ old('owner_name') }}">
                <span class="text-danger">{{ $errors->first('owner_name') }}</span>
            </div>

            <div class="col-md-6" {{ $errors->has('phone_number') ? 'has-error' : '' }}>
                <label  class="form-label">Phone Number</label>

                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" value="{{ old('ph_number') }}" onkeypress="return onlyNumberKey(event)">
                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
            </div>

            <div class="col-md-6" {{ $errors->has('city') ? 'has-error' : '' }}>
                <label  class="form-label">City</label>

                <input type="text" class="form-control" placeholder="Enter City" name="city" value="{{ old('city') }}" onkeypress="return lettersOnly(event)">
                <span class="text-danger">{{ $errors->first('city') }}</span>
            </div>
            <div class="col-md-6" {{ $errors->has('area') ? 'has-error' : '' }}>
                <label  class="form-label">Area</label>

                <select class="form-select" aria-label="Default select example" name="area">
                    <option selected>Select Area</option>
                    @forelse ($area as $list)
                    <option value="{{$list->name}}">{{$list->name}}</option>
                    @empty
                    <option>Empty</option>
                    @endforelse
                  </select>
                <span class="text-danger">{{ $errors->first('area') }}</span>
            </div>
            <div class="col-md-6" {{ $errors->has('sub_area') ? 'has-error' : '' }}>
                <label  class="form-label">Sub Area</label>

                <select class="form-select" aria-label="Default select example" name="sub_area">
                    <option selected>Select Sub-Area</option>
                    @forelse ($sub_area as $list)
                    <option value="{{$list->name}}">{{$list->name}}</option>
                    @empty
                    <option>Empty</option>
                    @endforelse
                  </select>
                <span class="text-danger">{{ $errors->first('sub_area') }}</span>
            </div>



            {{-- <div class="col-md-6" {{ $errors->has('image') ? 'has-error' : '' }}>
                <label  class="form-label">Shop Logo</label>

                <input type="file" className="form-control" name="image"/>
                <span class="text-danger">{{ $errors->first('image') }}</span>
            </div> --}}

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
      <script>
            function onlyNumberKey(evt) {

                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            function lettersOnly(evt) {
       evt = (evt) ? evt : event;
       var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
          ((evt.which) ? evt.which : 0));
       if (charCode > 31 && (charCode < 65 || charCode > 90) &&
          (charCode < 97 || charCode > 122)) {
          return false;
       }
       return true;
     }
        </script>

@endsection
