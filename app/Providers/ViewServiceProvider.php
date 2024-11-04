<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Alamat;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {

        View::composer('components.address-component', function ($view) {
            $view->with('provinces', Alamat::select('prov_id', 'prov_name')->distinct()->get());
        });
    }
}
