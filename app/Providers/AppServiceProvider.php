<?php

namespace App\Providers;

use App\Categories;
use Illuminate\Support\ServiceProvider;
use App\Cart;
use Session;
use function foo\func;

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
        view()->composer('web/partial/header', function($view){
            $categories = Categories::all();
            $view->with('category', $categories);
            $view->with('categories', $categories);
        });
        view()->composer('web/partial/header', function ($view){
            if(Session("cart")){
                $old_cart = Session::get('cart');
                $cart = new Cart($old_cart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice, 'totalQuatity'=>$cart->totalQuatity]);
            }
        });
    }
}
