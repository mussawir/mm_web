<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ItemTable extends PowerGridComponent
{
    use WithExport;

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

    public function datasource(): Builder
    {
        return Item::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            // ->add('id')
            ->add('image', fn ($item) => '<img class="w-25 rounded-full" src="' . asset("images/vendors/{$item->vendor_id}/items/250x250/{$item->image}") . '">')
            ->add('category', fn ($item) => $item->category->name)
            // ->add('vendor_id')
            ->add('name')
            // ->add('description')
            // ->add('discount')
            ->add('instock')
            ->add('price')
            ->add('qty');
            // ->add('measuring_unit')
            // ->add('qty_reorder')
            // ->add('max_order_qty')
            // ->add('sort_by')
            // ->add('is_addon')
            // ->add('is_grocery')
            // ->add('preparation_time')
            // ->add('created_at_formatted', fn (Item $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->index(),

            Column::make('Image', 'image'),
            
            Column::make('Category', 'category')
                ->sortable()
                ->searchable(),

            // Column::make('Vendor id', 'vendor_id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            // Column::make('description', 'description')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Discount', 'discount')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Instock', 'instock')
            //     ->sortable()
            //     ->searchable(),

            Column::make('Price', 'price')
                ->sortable()
                ->searchable(),

            Column::make('Qty', 'qty')
                ->sortable()
                ->searchable(),

            // Column::make('Measuring unit', 'measuring_unit')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Qty reorder', 'qty_reorder')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Max order qty', 'max_order_qty')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Sort by', 'sort_by')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Is addon', 'is_addon')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Is grocery', 'is_grocery')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Preparation time', 'preparation_time')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Item $row): array
    {
        return [
            Button::add('add-to-cart')
                ->slot('Add To Cart')
                ->id()
                ->class('btn btn-danger')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
