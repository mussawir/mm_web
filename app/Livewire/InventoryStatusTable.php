<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class InventoryStatusTable extends PowerGridComponent
{
	public function datasource(): ?Collection
	{
		// $records = [];

		// $rows = [1, 2];
		// $columns = [1, 2];
		// $levels = ['quarter', 'half', 'full', 'one third', 'two third', 'one fourth'];

		// foreach ($rows as $row) {
		// 	foreach ($columns as $column) {
		// 		foreach ($levels as $level) {
		// 			$apiResponse = $this->fetchDataFromApi($row, $column, $level);

		// 			if ($apiResponse) {
		// 				$records[] = [
		// 					'location' => 'Row: ' . $apiResponse['location']['row'] . ', Column: ' . $apiResponse['location']['column'] . ', Description: ' . $apiResponse['location']['description'],
		// 					'item' => $apiResponse['item_details']['item'],
		// 					'capacity' => $apiResponse['item_details']['capacity'],
		// 					'approx_current_quantity' => $apiResponse['item_details']['approx_current_quantity'],
		// 					'reorder_quantity' => $apiResponse['item_details']['reorder_quantity'],
		// 				];
		// 			}
		// 		}
		// 	}
		// }

		// // Convert the array to a collection before returning
		// return collect($records);

		$url = 'http://localhost:8000/api/v1/inventory/capacity';
		try {
			$response = Http::timeout(10)->get($url, [
				'row' => '1',
				'column' => '1',
				'level' => 'quarter'
			]);
	
			if ($response->successful()) {
				dd ($response->body());
			}
		} catch (\Exception $e) {
			dd('Error: ', $e->getMessage());
		}

		$apiUrls = [
			env('API_BASE_URL') . "/api/v1/inventory/capacity?row=1&column=1&level=quarter",
			env('API_BASE_URL') . "/api/v1/inventory/capacity?row=1&column=1&level=half",
			env('API_BASE_URL') . "/api/v1/inventory/capacity?row=1&column=1&level=full",
			env('API_BASE_URL') . "/api/v1/inventory/capacity?row=2&column=2&level=quarter",
			env('API_BASE_URL') . "/api/v1/inventory/capacity?row=2&column=2&level=half",
			// Add more URLs as needed
		];

		foreach ($apiUrls as $url) {
			$apiResponse = $this->fetchDataFromApi($url);
	
			if ($apiResponse) {
				$records[] = [
					'location' => 'Row: ' . $apiResponse['location']['row'] . ', Column: ' . $apiResponse['location']['column'] . ', Description: ' . $apiResponse['location']['description'],
					'item' => $apiResponse['item_details']['item'],
					'capacity' => $apiResponse['item_details']['capacity'],
					'approx_current_quantity' => $apiResponse['item_details']['approx_current_quantity'],
					'reorder_quantity' => $apiResponse['item_details']['reorder_quantity'],
				];
			}
		}
	
		// Convert the array to a collection before returning
		return collect($records);
	}

	public function setUp(): array
	{
		$this->showCheckBox();

		return [
			Exportable::make('export')
				->striped()
				->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
			Header::make()->showSearchInput(),
			Footer::make()
				->showPerPage()
				->showRecordCount(),
		];
	}

	public function fields(): PowerGridFields
	{
		return PowerGrid::fields()
			->add('location')
			->add('item')
			->add('capacity')
			->add('approx_current_quantity')
			->add('reorder_quantity');
	}

	public function columns(): array
	{
		return [
			Column::make('Location', 'location')
				->sortable()
				->searchable(),

			Column::make('Item', 'item')
				->sortable()
				->searchable(),

			Column::make('Capacity', 'capacity')
				->sortable()
				->searchable(),

			Column::make('Approx. Current Quantity', 'approx_current_quantity')
				->sortable()
				->searchable(),

			Column::make('Re-order Quantity', 'reorder_quantity')
				->sortable()
				->searchable(),
		];
	}

	private function fetchDataFromApi($url)
	{
		$client = new Client();

		try {
			$response = $client->request('GET', $url, [
				'timeout' => 10,
			]);

			if ($response->getStatusCode() === 200) {
				return json_decode($response->getBody(), true);
			}
		} catch (RequestException $e) {
			dd($e->getMessage());
		}

		return null;
	}
}
