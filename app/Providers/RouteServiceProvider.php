<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\GameMaster;
use App\GameType;
use App\KycMaster;
use App\OfferMaster;
use App\ResultMaster;
use App\TransactionMaster;
use App\UserGameMaster;
use App\WalletMaster;
use App\WinnerMaster;
use App\WithdrawMaster;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        //parent::boot();
        Route::model('game', GameMaster::class);
        Route::model('gameType', GameType::class);
        Route::model('kyc', KycMaster::class);
        Route::model('offer', OfferMaster::class);
        Route::model('result', ResultMaster::class);
        Route::model('transaction', TransactionMaster::class);
        Route::model('userGame', UserGameMaster::class);
        Route::model('wallet', WalletMaster::class);
        Route::model('winner', WinnerMaster::class);
        Route::model('withdraw', WithdrawMaster::class);
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
