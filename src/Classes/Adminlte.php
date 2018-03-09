<?php

namespace Mvishal\Adminlte\Classes;

use Illuminate\Support\Facades\Request;
use Mvishal\Adminlte\Contracts\AdminlteContract;

class Adminlte implements AdminlteContract
{

    public function views()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Views' => resource_path('views/vendor/adminlte'),
        ];
    }

    public function resourceAssets()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Assets/css' => resource_path('assets/css'),
            ADMINLTETEMPLATE_PATH . '/src/Assets/img' => resource_path('assets/img'),
            ADMINLTETEMPLATE_PATH . '/src/Assets/less' => resource_path('assets/less'),
            ADMINLTETEMPLATE_PATH . '/src/Assets/sass' => resource_path('assets/sass'),
            ADMINLTETEMPLATE_PATH . '/src/Assets/js' => resource_path('assets/js'),
            ADMINLTETEMPLATE_PATH . '/webpack.mix.js' => base_path('webpack.mix.js'),
            ADMINLTETEMPLATE_PATH . '/package.json' => base_path('package.json'),
        ];
    }

    public function publicAssets()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Public/img' => public_path('img'),
            ADMINLTETEMPLATE_PATH . '/src/Public/css' => public_path('css'),
            ADMINLTETEMPLATE_PATH . '/src/Public/js' => public_path('js'),
            ADMINLTETEMPLATE_PATH . '/src/Public/plugins' => public_path('plugins'),
            ADMINLTETEMPLATE_PATH . '/src/Public/fonts' => public_path('fonts'),
        ];
    }

    public function config()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Config/adminlte.php' => config_path('adminlte.php'),
        ];
    }

    public function registerController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/RegisterController.stub' => app_path('Http/Controllers/Auth/RegisterController.php'),
        ];
    }

    public function loginController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/LoginController.stub' => app_path('Http/Controllers/Auth/LoginController.php'),
        ];
    }

    public function forgotPasswordController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/ForgotPasswordController.stub' => app_path('Http/Controllers/Auth/ForgotPasswordController.php'),
        ];
    }

    public function resetPasswordController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/ResetPasswordController.stub' => app_path('Http/Controllers/Auth/ResetPasswordController.php'),
        ];
    }

    public function homeController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/HomeController.stub' => app_path('Http/Controllers/HomeController.php'),
        ];
    }

    public function dashboardController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/DashboardController.stub' => app_path('Http/Controllers/AdminController/DashboardController.php'),
        ];
    }

    public function settingController()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/SettingController.stub' => app_path('Http/Controllers/AdminController/SettingController.php'),
        ];
    }

    public function redirectIfAuthenticatedMiddleware()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/RedirectIfAuthenticated.stub' => app_path('Http/Middleware/RedirectIfAuthenticated.php'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers Method
    |--------------------------------------------------------------------------
    |
    */

    public function getAdminPath()
    {
        return config('adminlte.admin_path');
    }

    public function getAdminUrl($name = null)
    {
        if (isset($name)) {
            return str_finish($this->getAdminPath(), '/') . $name;
        }
        return $this->getAdminPath();
    }

    public function getFullAdminUrl($name = null)
    {
        if (isset($name)) {
            return url(str_finish($this->getAdminPath(), '/') . $name);
        }
        return url($this->getAdminPath());
    }

    public function activate_menu($url, $root = false)
    {
        if ($root) {
            if (Request::is($url)) {
                return 'active';
            }
        } else {
            if (Request::is($url) || Request::is($url . '/*')) {
                return 'active';
            }
        }
        return 'inactive';
    }

    public function getAppName()
    {
        return env('APP_NAME');
    }

    //I have used---

    public function webroutes()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/routes/web.php' => base_path('routes/web.php')
        ];
    }

    public function authConfig()
    {
        return [
            ADMINLTETEMPLATE_PATH . '/src/Stubs/auth.php.stub' => config_path('auth.php'),
        ];
    }

}