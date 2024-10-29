@extends('layouts.front')

@section('content')
<div class="container">
	<div class="my-4">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
					Camera
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
					Stored Photos
				</button>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
				<div>
					<power-grid :inventory-data="{{ json_encode($inventoryData) }}" />
				</div>
			</div>
			<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
				<div>
					<stored-photos :stored-photos="{{ json_encode($storedPhotos) }}" />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
