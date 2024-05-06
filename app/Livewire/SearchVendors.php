<?php

namespace App\Livewire;

use App\Models\Vendor;
use Livewire\Component;

class SearchVendors extends Component
{
	public $search = '';

	public function render()
	{
		// sleep(1);

		$vendors = [];

		if (trim($this->search)) {
			$vendors = Vendor::where('name', 'like', '%'.$this->search.'%')
			->OrWhere('contact_number_primary', 'like', '%'.$this->search.'%')
			// ->toSql();
			->get();

			// dd ($this->search, $vendors);
		}

		return view('livewire.search-vendors', compact('vendors'));
	}
}
