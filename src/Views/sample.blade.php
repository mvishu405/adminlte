<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample Laravel View</title>
</head>
<body>
<h4>View From Package</h4>


// $router->aliasMiddleware('adminlte', \Mvishal\Adminlte\Middleware\AdminlteMiddleware::class);

/*$this->publishes([
__DIR__.'/Config/adminlte.php' => config_path('adminlte.php'),
], 'adminlte_config');*/

$this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

$this->loadMigrationsFrom(__DIR__ . '/Migrations');

$this->loadTranslationsFrom(__DIR__ . '/Translations', 'adminlte');

/*$this->publishes([
__DIR__ . '/Translations' => resource_path('lang/vendor/adminlte'),
]);*/

// $this->loadViewsFrom(__DIR__ . '/Views', 'adminlte');

/*$this->publishes([
__DIR__ . '/Views' => resource_path('views/vendor/adminlte'),
]);*/

/*$this->publishes([
__DIR__ . '/Assets' => resource_path('assets/adminlte'),
]);*/
/**
* For publishing adminlte template
*/
$this->publishViews();
$this->publishHomeController();

if ($this->app->runningInConsole()) {
$this->commands([
\Mvishal\Adminlte\Commands\AdminlteCommand::class,
]);
}



rEGISTER METHOD CODE


/*$this->mergeConfigFrom(
__DIR__ . '/Config/adminlte.php', 'adminlte'
);*/





















/**
* Define the AdminLTETemplate routes.
*/
protected function defineRoutes()
{
if (!$this->app->routesAreCached()) {
$router = app('router');
$router->group(['namespace' => $this->getAppNamespace() . 'Http\Controllers'], function () {
require __DIR__ . '/../Http/routes.php';
});
}
}

/**
* Publish Home Controller.
*/
private function publishHomeController()
{
$this->publishes(Adminlte::homeController(), 'adminlte');
}

/**
* Change default Laravel RegisterController.
*/
private function changeRegisterController()
{
$this->publishes(AdminLTE::registerController(), 'adminlte');
}

/**
* Change default Laravel LoginController.
*/
private function changeLoginController()
{
$this->publishes(AdminLTE::loginController(), 'adminlte');
}

/**
* Change default Laravel forgot password Controller.
*/
private function changeForgotPasswordController()
{
$this->publishes(AdminLTE::forgotPasswordController(), 'adminlte');
}

/**
* Publish no guest forgot password Controller.
*/
private function publishNoGuestForgotPasswordController()
{
$this->publishes(AdminLTE::noGuestForgotPasswordController(), 'adminlte');
}

/**
* Change default Laravel reset password Controller.
*/
private function changeResetPasswordController()
{
$this->publishes(AdminLTE::resetPasswordController(), 'adminlte');
}

/**
* Publish public resource assets to Laravel project.
*/
private function publishPublicAssets()
{
$this->publishes(AdminLTE::publicAssets(), 'adminlte');
}

/**
* Publish package views to Laravel project.
*/
private function publishViews()
{
$this->loadViewsFrom(ADMINLTETEMPLATE_PATH . '/Views', 'adminlte');
$this->publishes(AdminLTE::views(), 'adminlte');
}

/**
* Publish package resource assets to Laravel project.
*/
private function publishResourceAssets()
{
$this->publishes(AdminLTE::resourceAssets(), 'adminlte');
}

/**
* Publish package tests to Laravel project.
*/
private function publishTests()
{
$this->publishes(AdminLTE::tests(), 'adminlte');
}

/**
* Publish package language to Laravel project.
*/
private function publishLanguages()
{
$this->loadTranslationsFrom(ADMINLTETEMPLATE_PATH . '/resources/lang/', 'adminlte_lang');
$this->publishes(AdminLTE::languages(), 'adminlte_lang');
}

/**
* Publish config Gravatar file using group.
*/
private function publishGravatar()
{
$this->publishes(AdminLTE::gravatar(), 'adminlte');
}

/**
* Publish adminlte package config.
*/
private function publishConfig()
{
$this->publishes(AdminLTE::config(), 'adminlte');
}

/**
* Publish routes/web.php file.
*/
private function publishWebRoutes()
{
$this->publishes(AdminLTE::webroutes(), 'adminlte');
}

/**
* Publish routes/api.php file.
*/
private function publishApiRoutes()
{
$this->publishes(AdminLTE::apiroutes(), 'adminlte');
}

/**
* Publish dusk tests files.
*/
private function publishDusk()
{
$this->publishDuskEnvironment();
$this->publishAppServiceProvider();
}

/**
* Publish dusk environment files.
*/
private function publishDuskEnvironment()
{
$this->publishes(AdminLTE::duskEnvironment(), 'adminlte');
}

/**
* Publish app/Providers/AppServiceProvider.php file.
*/
private function publishAppServiceProvider()
{
$this->publishes(AdminLTE::appServiceProviderClass(), 'adminlte');
}

/**
* Publish database config files.
*/
private function publishDatabaseConfig()
{
$this->publishes(AdminLTE::databaseConfig(), 'adminlte');
}

/**
* Enable (if active) spatie menu.
*/
private function enableSpatieMenu()
{
if ($this->app->getProvider('Spatie\Menu\Laravel\MenuServiceProvider')) {
require config_path('menu.php');
}
}





</body>
</html>
