<?php

namespace WBGenerateForm\Source\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use WBGenerateForm\Source\Core\Bootstrap\Generates\BootstrapGenerateCrud;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateDelete;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateEdit;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateList;
use WBGenerateForm\Source\Core\Bootstrap\Generates\LaravelGenerateNew;
use WBGenerateForm\Source\Core\Bootstrap\RedirectLaravel;
use WBGenerateForm\Source\Core\Redirect;
use WBGenerateForm\Source\Core\Initialize;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     * @return void
     */
    public function register(Container $pimple): void
    {
        $this->registerTools($pimple);
    }

    /**
     * @param Container $pimple
     * @return void
     */
    public function registerTools(Container $pimple): void
    {
//        $pimple->offsetSet(RedirectBootstrap::class, static function($pimple) {
//            $redirectBootstrap = new RedirectBootstrap();
//            $redirectBootstrap->setBootstrapGenerateCrud($pimple[BootstrapGenerateCrud::class]);
//            $redirectBootstrap->setBootstrapGenerateList($pimple[BootstrapGenerateList::class]);
//            $redirectBootstrap->setBootstrapGenerateNew($pimple[BootstrapGenerateNew::class]);
//            $redirectBootstrap->setBootstrapGenerateEdit($pimple[BootstrapGenerateEdit::class]);
//            $redirectBootstrap->setBootstrapGenerateDelete($pimple[BootstrapGenerateDelete::class]);
//
//            return $redirectBootstrap;
//        });
    }
}
