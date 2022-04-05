<?php

namespace App\Providers;

use App\Actions\ChangeStatusAction;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Actions\ViewAction;
use TCG\Voyager\Facades\Voyager;

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
        //Voyager::addAction(ChangeStatusAction::class, \App\Actions\ChangeStatusAction::class);
        //Voyager::replaceAction(ViewAction::class, \App\Actions\ViewAction::class);
        JsonResource::withoutWrapping();
    }
}
