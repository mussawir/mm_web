<div>
	<div class="bds-c-search-input bds-c-search-input--size-small">
		<label class="bds-c-search-input__label">
			<span class="sr-only">Search</span>
			<input
				class="bds-c-search-input__field search-input__text-input"
				type="search"
				wire:model.live='search'
				id="search-vendors"
				name="search-vendors"
				placeholder="Search vendors..."
				autocomplete="off"
			/>
			<span class="bds-c-search-input__search-icon">
				<svg aria-hidden="true" focusable="false" class="fl-none" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M9.96564 11.0259C9.13594 11.6381 8.11023 12 7 12C4.23858 12 2 9.76142 2 7C2 4.23858 4.23858 2 7 2C9.76142 2 12 4.23858 12 7C12 8.11026 11.6381 9.136 11.0259 9.96571C11.031 9.97051 11.036 9.97539 11.0409 9.98035L13.7803 12.7197C14.0732 13.0126 14.0732 13.4875 13.7803 13.7804C13.4874 14.0732 13.0125 14.0732 12.7196 13.7804L9.98029 11.041C9.97532 11.036 9.97044 11.031 9.96564 11.0259ZM10.5 7C10.5 8.933 8.933 10.5 7 10.5C5.067 10.5 3.5 8.933 3.5 7C3.5 5.067 5.067 3.5 7 3.5C8.933 3.5 10.5 5.067 10.5 7Z"></path>
				</svg>
			</span>
		</label>
	</div>
	<div class="list-group position-absolute z-1 w-100 py-2">
		@foreach ($vendors as $vendor)
		<a
			href="{{ route('vendor.detail', $vendor->id) }}"
			class="list-group-item list-group-item-action"
		>
			{{ $vendor->company_name }}
		</a>
		@endforeach
	</div>
</div>
