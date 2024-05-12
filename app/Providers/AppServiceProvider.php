<?php

namespace App\Providers;

use App\Http\View\CategoryComposer;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Gate::define('order-view', function (Customer $customer, Order $order) {
            return $customer->id == $order->customer_id;
        });
        View::composer('ecommerce.*', CategoryComposer::class);
    }
}
