# A PHPStan extension for PSR-11 ContainerInterface and ArrayAccess. Ex: Pimple\Container

This is an extension for PHPStan extension to resolve return type for PSR-11 container (Psr\Container\ContainerInterface) and Pimple Container (ArrayAccess)

This pacckage based on [phil-nelson/phpstan-container-extension](https://github.com/phil-nelson/phpstan-container-extension)

## Installation

Install with:

```
composer require --dev fcpl/phpstan-container-extension
```

Add the `extension.neon` file to your PHPStan config:

```
includes:
  - vendor/fcpl/phpstan-container-extension/extension.neon
```

Or use [phpstan/extension-installer](https://github.com/phpstan/extension-installer)

## Sample

```php
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pimple\Container;
use Pimple\Psr11\ServiceLocator;
use Psr\Log\LoggerInterface;
...
    $container = new Container();
    $container->offsetSet(HandlerInterface::class, new StreamHandler($this->getLogFile()));
    $container->offsetSet(
        LoggerInterface::class,
        function (Container $container): Logger {
            /** @var HandlerInterface $streamHandler */
            $streamHandler = $container->offsetGet(HandlerInterface::class);
            return new Logger(self::class, [$streamHandler]);
        }
    );
    return new ServiceLocator($container, [LoggerInterface::class, ConverterFileInterface::class]);
...
```

## License
All contents of this package are licensed under the [MIT license](https://github.com/webmozarts/assert/blob/master/LICENSE).

