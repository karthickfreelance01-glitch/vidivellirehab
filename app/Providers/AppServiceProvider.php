<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /*
         * Base path every theme asset is loaded from. Defaults to "/" (site root,
         * i.e. the project served with public/ as the document root). If you serve
         * the project from a sub-folder, set ASSET_BASE in .env, e.g.
         * ASSET_BASE=/vidivellirehab/public/
         */
        $base = config('site.asset_base');
        if ($base === null || $base === '') {
            $base = $this->app->runningInConsole() ? '/' : request()->getBasePath();
        }
        View::share('A', rtrim($base, '/').'/');
    }
}
