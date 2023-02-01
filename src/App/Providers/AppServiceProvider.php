<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Domain\Mapper\Brands\Livewire\BrandsMerge;
use Domain\Mapper\Brands\Livewire\BrandsTable;
use Domain\Mapper\Colors\Livewire\ColorsMerge;
use Domain\Mapper\Colors\Livewire\ColorsTable;
use Domain\Mapper\MadeIns\Livewire\MadeInsMerge;
use Domain\Mapper\MadeIns\Livewire\MadeInsTable;
use Domain\Mapper\Seasons\Livewire\SeasonsMerge;
use Domain\Mapper\Seasons\Livewire\SeasonsTable;
use Domain\Mapper\Materials\Livewire\MaterialsMerge;
use Domain\Mapper\Materials\Livewire\MaterialsTable;
use Domain\Mapper\SubBrands\Livewire\SubBrandsMerge;
use Domain\Mapper\SubBrands\Livewire\SubBrandsTable;
use Support\Components\Merge\SimpleMerge\MappingTable;
use Support\Components\Table\SimpleTable\LineComponent;
use Domain\Mapper\SizeRegions\Livewire\SizeRegionsMerge;
use Domain\Mapper\SizeRegions\Livewire\SizeRegionsTable;
use Support\Components\Table\SimpleTable\TableComponent;
use Domain\Mapper\Compositions\Livewire\CompositionsMerge;
use Domain\Mapper\Compositions\Livewire\CompositionsTable;
use Support\Components\Table\SimpleTable\CreateSimpleItem;
use Support\Components\Modal\SimpleConfirmationModalWithId;
use Support\Components\Merge\SimpleMerge\SingleItemSelectApi;
use Support\Components\Merge\SimpleMerge\MultipleItemsSelectApi;
use Support\Components\Merge\SimpleMerge\ShowCurrentSelectedItems;
use Domain\Mapper\ManufactureCompanies\Livewire\ManufactureCompaniesMerge;
use Domain\Mapper\ManufactureCompanies\Livewire\ManufactureCompaniesTable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // colors
        Livewire::component('mapper.colors.colors-table', ColorsTable::class);
        Livewire::component('mapper.colors.colors-merge', ColorsMerge::class);

        // brands
        Livewire::component('mapper.brands.brands-table', BrandsTable::class);
        Livewire::component('mapper.brands.brands-merge', BrandsMerge::class);

        // size region
        Livewire::component('mapper.size-regions.size-regions-table', SizeRegionsTable::class);
        Livewire::component('mapper.size-regions.size-regions-merge', SizeRegionsMerge::class);

        // made in
        Livewire::component('mapper.made-ins.made-ins-table', MadeInsTable::class);
        Livewire::component('mapper.made-ins.made-ins-merge', MadeInsMerge::class);

        // materials
        Livewire::component('mapper.materials.materials-table', MaterialsTable::class);
        Livewire::component('mapper.materials.materials-merge', MaterialsMerge::class);

        // compositions
        Livewire::component('mapper.compositions.compositions-table', CompositionsTable::class);
        Livewire::component('mapper.compositions.compositions-merge', CompositionsMerge::class);

        // seasons
        Livewire::component('mapper.seasons.seasons-table', SeasonsTable::class);
        Livewire::component('mapper.seasons.seasons-merge', SeasonsMerge::class);

        // sub-brands
        Livewire::component('mapper.sub-brands.sub-brands-table', SubBrandsTable::class);
        Livewire::component('mapper.sub-brands.sub-brands-merge', SubBrandsMerge::class);

        // sub-brands
        Livewire::component('mapper.manufacture-companies.manufacture-companies-table', ManufactureCompaniesTable::class);
        Livewire::component('mapper.manufacture-companies.manufacture-companies-merge', ManufactureCompaniesMerge::class);

        // Components
        // Merge // Simple Merge
        // Single Item select API
        Livewire::component('components.merge.simple-merge.single-item-select-api', SingleItemSelectApi::class);

        // Multiple Items select API
        Livewire::component('components.merge.simple-merge.multiple-items-select-api', MultipleItemsSelectApi::class);

        // Show current selected items
        Livewire::component('components.merge.simple-merge.show-current-selected-items', ShowCurrentSelectedItems::class);

        // Mapping table
        Livewire::component('components.merge.simple-merge.mapping-table', MappingTable::class);

        // Table // Simple Table
        // Table Component
        Livewire::component('components.table.simple-table.table', TableComponent::class);

        // Line component
        Livewire::component('components.table.simple-table.line-component', LineComponent::class);

        // Table // Simple Table // Create Simple Item
        // Create Simple Item
        Livewire::component('components.table.simple-table.create-simple-item', CreateSimpleItem::class);

        // Modal
        // simple confirmation modal with id
        Livewire::component('components.modal.simple-confirmation-modal-with-id', SimpleConfirmationModalWithId::class);
    }
}
