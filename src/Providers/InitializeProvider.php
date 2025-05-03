<?php

namespace WBGenerateForm\Source\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateCrud;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateDelete;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateEdit;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateList;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateNew;
use WBGenerateForm\Source\Core\Bootstrap\RedirectBootstrap;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateCrud;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateEdit;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateList;
use WBGenerateForm\Source\Core\Laravel\Generates\LaravelGenerateNew;
use WBGenerateForm\Source\Core\Laravel\RedirectLaravel;
use WBGenerateForm\Source\Core\Redirect;
use WBGenerateForm\Source\Core\Initialize;

class InitializeProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $this->registerTools($pimple);
        $this->registerBootstrap($pimple);
        $this->registerLaravel($pimple);
    }

    public function registerTools(Container $pimple)
    {
        $pimple->offsetSet(Redirect::class, static function($pimple) {
            $redirect = new Redirect();
            $redirect->setRedirectBootstrap($pimple[RedirectBootstrap::class]);
            $redirect->setRedirectLaravel($pimple[RedirectLaravel::class]);

            return $redirect;
        });

        $pimple->offsetSet(Initialize::class, static function($pimple) {
            $runner = new Initialize();
            $runner->setRedirect($pimple[Redirect::class]);

            return $runner;
        });
    }

    public function registerLaravel(Container $pimple)
    {
        $pimple->offsetSet(LaravelGenerateCrud::class, static function($pimple) {
            return new LaravelGenerateCrud();
        });

        $pimple->offsetSet(RedirectLaravel::class, static function($pimple) {
            $redirectBootstrap = new RedirectLaravel();
            $redirectBootstrap->setLaravelGenerateCrud($pimple[LaravelGenerateCrud::class]);
            return $redirectBootstrap;
        });
    }

    public function registerBootstrap(Container $pimple)
    {
        $pimple->offsetSet(BootstrapGenerateCrud::class, static function($pimple) {
            return new BootstrapGenerateCrud();
        });

        $pimple->offsetSet(RedirectBootstrap::class, static function($pimple) {
            $redirectBootstrap = new RedirectBootstrap();
            $redirectBootstrap->setBootstrapGenerateCrud($pimple[BootstrapGenerateCrud::class]);

            return $redirectBootstrap;
        });
    }
}