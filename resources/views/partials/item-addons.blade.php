@if ($addedAddons)
<table class="table table-striped table-hover">
	<tbody>
		@foreach ($addedAddons as $addon)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $addon->name }}</td>
			<td>{{ session('currency')->symbol }} {{ $addon->price }}</td>
			<td class="text-center">
				<button type="button" class="btn btn-danger btn-sm remove-addon" data-addon-id="{{ $addon->id }}">
					<i class="bx bx-x"></i>
				</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif