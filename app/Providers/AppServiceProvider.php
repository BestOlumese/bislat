<?php

namespace App\Providers;
use View;
use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Authenticated;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('categories', Category::all());
        View::share('subrand', Subcategory::take(5)->inRandomOrder()->get());
        View::share('subcategories', Subcategory::take(12)->get());
        View::share('allsubcategories', Subcategory::all());
        View::share('wishpro', Product::all());
        
        View::share('moresubcategories', Subcategory::skip(12)->take(100)->get());

        
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
