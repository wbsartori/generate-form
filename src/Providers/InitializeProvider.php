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
use WBGenerateForm\Source\Core\Redirect;
use WBGenerateForm\Source\Core\Initialize;

class InitializeProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {

        $pimple->offsetSet(BootstrapGenerateCrud::class, static function($pimple) {
            return new BootstrapGenerateCrud();
        });

        $pimple->offsetSet(BootstrapGenerateList::class, static function($pimple) {
            return new BootstrapGenerateList();
        });

        $pimple->offsetSet(BootstrapGenerateNew::class, static function($pimple) {
            return new BootstrapGenerateNew();
        });

        $pimple->offsetSet(BootstrapGenerateEdit::class, static function($pimple) {
            return new BootstrapGenerateEdit();
        });

        $pimple->offsetSet(BootstrapGenerateDelete::class, static function($pimple) {
            return new BootstrapGenerateDelete();
        });

        $pimple->offsetSet(RedirectBootstrap::class, static function($pimple) {
            $redirectBootstrap = new RedirectBootstrap();
            $redirectBootstrap->setBootstrapGenerateCrud($pimple[BootstrapGenerateCrud::class]);
            $redirectBootstrap->setBootstrapGenerateList($pimple[BootstrapGenerateList::class]);
            $redirectBootstrap->setBootstrapGenerateNew($pimple[BootstrapGenerateNew::class]);
            $redirectBootstrap->setBootstrapGenerateEdit($pimple[BootstrapGenerateEdit::class]);
            $redirectBootstrap->setBootstrapGenerateDelete($pimple[BootstrapGenerateDelete::class]);

            return $redirectBootstrap;
        });

        $pimple->offsetSet(Redirect::class, static function($pimple) {
            $redirect = new Redirect();
            $redirect->setRedirectBootstrap($pimple[RedirectBootstrap::class]);

            return $redirect;
        });

        $pimple->offsetSet(Initialize::class, static function($pimple) {
            $runner = new Initialize();
            $runner->setRedirect($pimple[Redirect::class]);

            return $runner;
        });

        $pimple->offsetSet(ServiceProvider::class, (new ServiceProvider()));
    }
}