<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     */
    public function register(): void
    {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        $this->configureCommands();
//        $this->configureUrlScheme();
//        $this->configureModels();
//        $this->configureDates();
//        $this->configureLoginThrottle();
//        $this->configureFactoriesNameSpace();
    }

    /**
     * Configure the application's commands.
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction()
        );
    }

    /**
     * Configure the application's URL scheme.
     */
    private function configureUrlScheme(): void
    {
        if ($this->app->isProduction()) {
            URL::forceScheme('https');
        }
    }

    /**
     * Configure the application's models.
     */
    private function configureModels(): void
    {
        //Model::unguard();

        //Model::shouldBeStrict();
    }

    /**
     * Configure the application's dates.
     */
    private function configureDates(): void
    {
        Date::use(CarbonImmutable::class);
    }

    /**
     * Configure the application's factories namespace.
     */
    private function configureFactoriesNameSpace(): void
    {
        Factory::guessFactoryNamesUsing(function (string $model_name) {
            $namespace  = 'Database\\Factories\\';
            $model_name = Str::afterLast($model_name, '\\');

            return $namespace . $model_name . 'Factory';
        });
    }

    /**
     * Configure the application's login throttle.
     */
    private function configureLoginThrottle(): void
    {
        RateLimiter::for('login', function (Request $request) {
            return [
                Limit::perMinute(config('auth.login_attempts'), config('auth.login_decay_minutes'))
                     ->by($request->input('email') ?: $request->ip())
                     ->response(function (Request $request, array $headers) {
                         $seconds = $headers['Retry-After'];

                         $message = [
                             'email' => Lang::get('auth.throttle', [
                                 'seconds' => $seconds,
                             ])
                         ];

                         return response($message, 429, $headers);
                     }),
            ];
        });
    }
}
