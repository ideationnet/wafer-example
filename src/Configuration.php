<?php


namespace WaferExample;

use function DI\get;
use function DI\object;
use IdNet\StackRunner\StackRunner;
use IdNet\Wafer\Action;
use IdNet\Wafer\Handler\EchoDomainHandler;
use IdNet\Wafer\Middleware\ActionDomainResponder;
use Interop\Http\Factory\ResponseFactoryInterface;
use Interop\Http\Factory\StreamFactoryInterface;
use Middlewares\Utils\ResponseFactory;
use Middlewares\Utils\StreamFactory;

class Configuration
{

    public static function getConfig()
    {
        return [

            'routes' => [
                ['GET', '/', 'action.echo']
            ],

            'action.echo' => object(Action::class)
                ->method('domain', EchoDomainHandler::class),

            'middleware' => [
                ActionDomainResponder::class
            ],

            StackRunner::class => object()
                ->constructorParameter('stack', get('middleware')),


            ResponseFactoryInterface::class => get(ResponseFactory::class),
            StreamFactoryInterface::class => get(StreamFactory::class),

        ];
    }

}
