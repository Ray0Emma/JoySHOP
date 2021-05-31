<?php

namespace App\Providers;

use Config;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        //bind the setting model and then using the AliasLoader, we register it as a facade.
        $this->app->bind('settings', function ($app) {
            return new Setting();
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Setting', Setting::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // only use the Settings package if the Settings table is present in the database
        if (!\App::runningInConsole() && count(Schema::getColumnListing('settings'))) {
            $settings = Setting::all();
            foreach ($settings as $key => $setting)
            {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }

        /**
         * In the above code example,
         * firstly we are checking if the application is not running in the console
         * and there is a table exist with the name settings.
         * Then we are loading all settings from the Setting model
         * and then setting all values using the Laravel Config class.
         */
    }
}
