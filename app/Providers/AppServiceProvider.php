<?php

namespace App\Providers;

use App\Models\giohang;
use Illuminate\Support\ServiceProvider;
use Session;

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
        view()->composer('client_view.header', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new giohang($oldCart);
                $view->with([
                    'cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty,

                ]);
            }
        });

        view()->composer('client.page_cart', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new giohang($oldCart);
                $view->with([
                    'cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty,
                ]);
            }
        });

        view()->composer('client.page_checkout', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new giohang($oldCart);
                $view->with([
                    'cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty,
                ]);
            }
        });
    }
}
