<?php

namespace Domain\Color\Providers;

use Livewire\Livewire;
use Domain\Colors\Merge\ColorsMerge;
use Domain\Colors\Table\ColorsTable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Domain\DesiluxLegacy\ApiClients\DesiluxLegacyRestClient;
use Domain\DesiluxLegacy\Actions\DesiluxLegacyGetVendorAction;
use Domain\DesiluxLegacy\Console\DesiluxLegacyDownloadAttributesCommand;
use Domain\DesiluxLegacy\Console\DesiluxLegacyDownloadProductModelsCommand;

class ColorProvider extends ServiceProvider
// implements DeferrableProvider
{
    public function register(): void
    {
        // Livewire::component('colors.table.colors-table', ColorsTable::class);
        // Livewire::component('colors.merge.colors-merge', ColorsMerge::class);

        // $this->app->singleton(DesiluxLegacyGetVendorAction::class, function () {
        //     return new DesiluxLegacyGetVendorAction();
        // });
        // $this->app->singleton(DesiluxLegacyRestClient::class, function ($app) {
        //     return new DesiluxLegacyRestClient($app->make(DesiluxLegacyGetVendorAction::class));
        // });
    }

    public function boot(): void
    {
        // Livewire::component('colors.table.colors-table', ColorsTable::class);
        // Livewire::component('colors.merge.colors-merge', ColorsMerge::class);


        // $this->loadMigrationsFrom(database_path('migrations/vendor_desilux_legacy'));
        // $this->commands([
        //     DesiluxLegacyDownloadAttributesCommand::class,
        //     DesiluxLegacyDownloadProductModelsCommand::class,
        // ]);
    }

    public function provides(): array
    {
        return [
            // DesiluxLegacyGetVendorAction::class,
            // DesiluxLegacyRestClient::class,
            // DesiluxLegacyDownloadAttributesCommand::class,
            // DesiluxLegacyDownloadProductModelsCommand::class,
        ];
    }
}
