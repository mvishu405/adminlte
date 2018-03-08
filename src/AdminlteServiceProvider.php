<?php

namespace Mvishal\Adminlte;

use Illuminate\Console\DetectsApplicationNamespace;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Mvishal\Adminlte\Facades\Adminlte;

class AdminlteServiceProvider extends ServiceProvider
{
    use DetectsApplicationNamespace;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->defineRoutes($router);
        $this->publishViews();
        $this->publishResourceAssets();
//        $this->publishPublicAssets();
        $this->publishConfig();
        $this->changeRegisterController();
        $this->changeLoginController();
        $this->changeForgotPasswordController();
        $this->changeResetPasswordController();
//        $this->publishHomeController();
        $this->publishDashboardController();
        $this->publishSettingController();
        $this->publishRedirectIfAuthenticatedMiddleware();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (!defined('ADMINLTETEMPLATE_PATH')) {
            define('ADMINLTETEMPLATE_PATH', realpath(__DIR__ . '/../'));
        }

        $this->app->bind('Adminlte', function () {
            return new \Mvishal\Adminlte\Classes\Adminlte();
        });
    }

    protected function defineRoutes(Router $router)
    {
        if (!$this->app->routesAreCached()) {
            $router->group(['namespace' => $this->getAppNamespace() . 'Http\Controllers'], function () {
                require __DIR__ . '/Http/routes.php';
            });
        }
    }

    private function publishViews()
    {
        $this->loadViewsFrom(ADMINLTETEMPLATE_PATH . '/src/Views', 'adminlte');
        $this->publishes(AdminLTE::views(), 'adminlte');
    }

    private function publishResourceAssets()
    {
        $this->publishes(AdminLTE::resourceAssets(), 'adminlte');
    }

    private function publishPublicAssets()
    {
        $this->publishes(AdminLTE::publicAssets(), 'adminlte');
    }

    private function publishConfig()
    {
        $this->publishes(AdminLTE::config(), 'adminlte');
    }


    private function changeRegisterController()
    {
        $this->publishes(AdminLTE::registerController(), 'adminlte');
    }


    private function changeLoginController()
    {
        $this->publishes(AdminLTE::loginController(), 'adminlte');
    }


    private function changeForgotPasswordController()
    {
        $this->publishes(AdminLTE::forgotPasswordController(), 'adminlte');
    }

    private function changeResetPasswordController()
    {
        $this->publishes(AdminLTE::resetPasswordController(), 'adminlte');
    }

    private function publishHomeController()
    {
        $this->publishes(AdminLTE::homeController(), 'adminlte');
    }

    private function publishDashboardController()
    {
        $this->publishes(Adminlte::dashboardController(), 'adminlte');
    }

    private function publishSettingController()
    {
        $this->publishes(Adminlte::settingController(), 'adminlte');
    }

    private function publishRedirectIfAuthenticatedMiddleware()
    {
        $this->publishes(Adminlte::redirectIfAuthenticatedMiddleware(), 'adminlte');
    }
}
