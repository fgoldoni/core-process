# Core Process

🍅 Modelling Busines Processes in Laravel



## Installation

```bash
composer require goldoni/core-process:dev-main
```

To begin with, we will need an abstract class that our business process classes can extend to minimize code duplication.
```php
<?php

abstract class AbstractProcess
{
    public array $tasks;
 
    public function handle(object $payload): mixed
    {
        return Pipeline::send(
            passable: $payload,
        )->through(
            pipes: $this->tasks,
        )->thenReturn();
    }
}
```
Our business process class will have many associated tasks, which we declare in the implementation. Then our abstract process will take the passed-on payload and send it through these tasks - eventually returning. Unfortunately, I can't think of a nice way to return an actual type instead of mixed, but sometimes we have to compromise...
```bash
<?php

class PlaceNewOrderForCustomer extends AbstractProcess
{
    public array $tasks = [
        CreateNewOrderRecord::class,
        ChargeCustomerForOrder::class,
        SendConfirmationEmail::class,
        SendOrderToStore::class,
    ];
}
```


**You should publish** the config file with:

```bash
php artisan vendor:publish --provider="Goldoni\CoreProcess\CoreProcessServiceProvider"
```

## Credits

- [Goldoni Fouotsa](https://github.com/fgoldoni)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
