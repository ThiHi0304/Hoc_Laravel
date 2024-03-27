<?php

namespace App\Providers;
use App\View\Components\Alert;
// use App\View\Components\Inputs\Button;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
// use App\View\Components\Forms\Button as FormButton;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('datetime', function ($expression) {
            $expression=trim($expression,'\'');
            $expression=trim($expression,'""');
            $dataObject = date_create($expression);
            if (!empty($dataObject)) {
            $dateFormat=$dataObject->format('d/m/Y H:i:s');
                return  $dateFormat;
            }
        });
        
        
        
    }
    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('env', function($value) {
            if(config('app.env') === $value) {
                return true;
            }
            return false;
        });
    
        Blade::component('package-alert', Alert::class);
        // Blade::component('button', Button::class);
        // Blade::component('forms-button', FormButton::class);
        Paginator::useBootstrap();
    }
    
}
