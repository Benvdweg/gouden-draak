<?php

namespace App\Providers;

use App\Models\WaiterCall;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('callCount', WaiterCall::where('handled', false)->count());
        });
    }
}
