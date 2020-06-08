<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade john theme to newer
 * versions in the future.
 *
 * @category    John
 * @package     shopping cart
 * @author      John Nguyen
 * @copyright   Copyright (c) John Nguyen
 */ 
namespace Johnnguyen\Cart;

use Illuminate\Auth\Events\Logout;
use Illuminate\Session\SessionManager;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cart', 'Johnnguyen\Cart\Cart');

        $config = __DIR__ . '/../config/cart.php';
        $this->mergeConfigFrom($config, 'cart');

        $this->publishes([__DIR__ . '/../config/cart.php' => config_path('cart.php')], 'config');

        $this->app['events']->listen(Logout::class, function () {
            if ($this->app['config']->get('cart.destroy_on_logout')) {
                $this->app->make(SessionManager::class)->forget('cart');
            }
        });

        if ( ! class_exists('CreateCartTable')) {
            // Publish the migration
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/../database/migrations/0000_00_00_000000_create_Cart_table.php' => database_path('migrations/'.$timestamp.'_create_Cart_table.php'),
            ], 'migrations');
        }
    }
}
