<?php

namespace App\Providers;

use App\Helpers\FormatedNumber;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        \ImLiam\BladeHelper\Facades\BladeHelper::directive('money', function ($value) {
            $foramt_number = new FormatedNumber();

            return $foramt_number->getFormattedNumber(
                $value,
                locale: 'en_US',
                style: \NumberFormatter::CURRENCY,
                precision: 2,
                currencyCode: 'ZMW'
            );
        });
        \ImLiam\BladeHelper\Facades\BladeHelper::directive('percent', function ($value) {
            $foramt_number = new FormatedNumber();

            return $foramt_number->getFormattedNumber(
                $value,
                style: \NumberFormatter::PERCENT,
                precision: 1,
            );
        });
        \ImLiam\BladeHelper\Facades\BladeHelper::directive('spellout', function ($value) {
            $foramt_number = new FormatedNumber();

            return $foramt_number->getFormattedNumber(
                $value,
                style: \NumberFormatter::SPELLOUT,
            );
        });
    }
}
