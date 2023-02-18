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
