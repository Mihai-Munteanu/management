<?php

use Illuminate\Support\Facades\Route;
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
use Domain\Mapper\SizeRegions\Livewire\SizeRegionsMerge;
use Domain\Mapper\SizeRegions\Livewire\SizeRegionsTable;
use Domain\Mapper\Compositions\Livewire\CompositionsMerge;
use Domain\Mapper\Compositions\Livewire\CompositionsTable;
use Domain\Mapper\ManufactureCompanies\Livewire\ManufactureCompaniesMerge;
use Domain\Mapper\ManufactureCompanies\Livewire\ManufactureCompaniesTable;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/colors', ColorsTable::class)->name('mapper.colors');
    Route::get('/colors/merge', ColorsMerge::class)->name('mapper.colors.merge');

    Route::get('/seasons', SeasonsTable::class)->name('mapper.seasons');
    Route::get('seasons/merge', SeasonsMerge::class)->name('mapper.seasons.merge');

    Route::get('/sub-brands', SubBrandsTable::class)->name('mapper.sub-brands');
    Route::get('/sub-brands/merge', SubBrandsMerge::class)->name('mapper.sub-brands.merge');

    Route::get('/brands', BrandsTable::class)->name('mapper.brands');
    Route::get('/brands/merge', BrandsMerge::class)->name('mapper.brands.merge');

    Route::get('/size-regions', SizeRegionsTable::class)->name('mapper.size-regions');
    Route::get('/size-regions/merge', SizeRegionsMerge::class)->name('mapper.size-regions.merge');

    Route::get('/made-ins', MadeInsTable::class)->name('mapper.made-ins');
    Route::get('/made-ins/merge', MadeInsMerge::class)->name('mapper.made-ins.merge');

    Route::get('/materials', MaterialsTable::class)->name('mapper.materials');
    Route::get('/materials/merge', MaterialsMerge::class)->name('mapper.materials.merge');

    Route::get('/compositions', CompositionsTable::class)->name('mapper.compositions');
    Route::get('/compositions/merge', CompositionsMerge::class)->name('mapper.compositions.merge');

    Route::get('/manufacturer-companies', ManufactureCompaniesTable::class)->name('mapper.manufacturer-companies');
    Route::get('/manufacturer-companies/merge', ManufactureCompaniesMerge::class)->name('mapper.manufacturer-companies.merge');
});
