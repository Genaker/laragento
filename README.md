# Laragento LAravel MAgento Micro services

Magento 2 has legacy code based on abandoned **Zend Framework 1** with really ugly ORM on top of outdated **Zend_DB**. Zend_DB is not even in the latest version. 

This repo is a collection of Model classes that allows you to get data directly from a Magento 2 database using modern **ORM**.

laragento is a collection of PHP classes built on top of **Eloquent ORM** (from Laravel framework), that provides a fluent interface to connect and get data directly from a Magento database.

You can use legacy MAgento 2 as the backend (administration panel), and any other PHP app  (Symfony/Laravel/Lumen/Vanilla.PHP etc.) and querying that data (as a Model layer). It's easier to use Laragento with Laravel, but you're free to use it with any PHP project using Composer.

# History 

After releases of the VueStorefron and Hyva Theme (A brand-new frontend for Magento 2 without reusing magento UI and using Laravel ecosystem as a base Alpine.JS / Tailwind CSS) everybody understands that the only way to build a good eCommerce Website is not to use M2 broken legacy frontend/backend functionality. I have been using this library for the last 3 years and see only benefits. Even if you need reimplement functionality from scratch it is much faster than reuse Adobe Commerce broken core framework bloatware.

**Why Laravel and Eloquent?**

Laravel is the most popular PHP framework. I have used different ORMs and Eloquent is the best.

# Magento ORM Concept

Data is the essence of any web application. Models are the essence of the ORM. A model is an abstraction that represents a magento table in the database. In Larafento, it is a class that extends base Eloquent/Model.

The model tells Eloquent several things about the entity it represents, such as the name of the table in the database and optionally which columns it has (and their data types).

A model has a name. This name does not have to be the same name of the Magento table it represents in the database. catalog_product_entity -> CatalogProductEntity. 

# Documentation 
This solution doesn't require documentation because it reuses a widely used software development tools vs Magento 2 in house built framework. 

**Official Eloquent Documentation:** https://laravel.com/docs/8.x/eloquent 

If you have any issues and Enterprise (Adobe Commerce) Version support create a ticket or drop me email at: yegorshytikov@gmail.com

# Install Laragento 

You need to use Composer to install Laragento into your project:

```
composer config repositories.foo '{"type": "vcs", "url": "https://github.com/Genaker/laragento", "trunk-path": "master"}'
composer require Genaker/laragento
```

# Other PHP Framework (not Laravel and Magento) Setup

Here you have to configure the database to work with MAgento. First, you should include the Composer autoload file if not already loaded:
```
require __DIR__ . '/vendor/autoload.php';
```
Now you must set your Magento2 database params:
```
$params = array(
    'database'  => 'database_name',
    'username'  => 'username',
    'password'  => 'pa$$word',
    'prefix'    => '' 
);
Laragento\DB::connect($params);
```
You can specify all Eloquent params, but some are default (but you can override them).
```
'driver'    => 'mysql',
'host'      => 'localhost',
'charset'   => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix'    => '', 
```

However it will be better to use it as a separate Magento-les microservice entry point in the separate directory together with Laravel or Lumen.

# LAravel MAgento with Tinker (REPL)

Laravel Tinker is a powerful REPL for the Laravel framework, powered by the PsySH package.

# Tinker Installation

All Laravel applications include Tinker by default. However, you may install Tinker using Composer if you have previously removed it from your application:

```
composer create-project laravel/laravel laragento 
cd laragento
composer require laravel/tinker
composer config repositories.foo '{"type": "vcs", "url": "https://github.com/Genaker/laragento", "trunk-path": "master"}'
composer require Genaker/laragento
```

Set proper DB connect in the **.env**  file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

# Tinker Usage

Tinker allows you to interact with your entire Laravel application on the command line, including your Eloquent models (Laragento), jobs, events, and more. To enter the Tinker environment, run the tinker Artisan command:
```
php artisan tinker

$products = Laragento\Models\CatalogProductEntity::first();

$products = Laragento\Models\CatalogProductEntity::where('sku', '21157');

$products = Laragento\Models\CatalogProductEntity::where('sku', '21157')->with('catalog_product_entity_varchars')->get();

$orders = Laragento\Models\SalesOrder::limit(10)->with('sales_order_items', 'sales_invoices', 'sales_order_payments', 'sales_creditmemos', 'sales_order_addresses', 'sales_shipments', 'customer_entity')->get(); 
$orders->toJson();

$creditMemo = Laragento\Models\SalesCreditmemo::limit(1)->with('sales_order','sales_creditmemo_items','sales_creditmemo_comments', 'sales_creditmemo_items')->get(); $creditMemo->toArray()

$invoices = Laragento\Models\SalesInvoice::limit(1)->with('sales_order','sales_invoice_items','sales_invoice_comments')->get(); $invoices->toJson();

```
# Example of the Magento Order to ERM implementation 

```
require __DIR__ . '/vendor/autoload.php';

$orders = Laragento\Models\SalesOrder::whereNull('sync_status')->with('sales_order_items', 'sales_invoices', 'sales_order_payments', 'sales_creditmemos', 'sales_order_addresses', 'sales_shipments', 'customer_entity', 'sales_payment_transactions')->get();
 
foreach ($oreders as $order) {
    $response = $erp->orderAPI($order->toJson());
    if ($response->responseCode === 200) {
        $order->sync_status = 'sent_to_erp';
        $order->save();
    } else {
        echo "Error";
    }
}

```
No ObjectManager, DI and other stuff required. 

# Laravel/Eloquent and static::methods

Some Magento 2 bloatware lovers hate static methods. For those guys Laravel has a solution...

Static Example: 
```
$user = User::find(1);
var_dump($user->name);
```

Laravel isn't using a static method, you are. Another way to do this which you are probably looking for is to use dependency injection, which Laravel makes very easy because it can be done automatically. So in whatever class you are using your User model in, you should be setting up something like this in the constructor...

```
public function __construct(User $user)
{
    $this->user = $user;
}
```

And then you can modify your code to not use the static bindings.

```
$user = $this->user->find(1);
var_dump($user->name);
```

More about Eloquent you can watch here:

https://www.youtube.com/watch?v=uyQH90okBNQ&list=PL8nVHL94VZ18EGJX9iSR01Xx7vgzX6Uar

# Integration with Magento 2 / 1 Framework 

Install this ORM to the separate folder 
```
mkdir orm
cd orm
composer require genaker/laragento @dev
```

Run this command. Magento 2 uses outdated Monolog version and has conflict in the composers: 

```
find ./orm/vendor/ -type f -exec sed -i -e 's/Monolog/Monolog2/g' {} \;
mv ./orm/vendor/monolog/monolog/src/Monolog/ vendor/monolog/monolog/src/Monolog2/
```

add to the **app/bootstrap.php** additional autoloader 
```
# After This
require_once __DIR__ . '/autoload.php';
# Insert This
require_once __DIR__ . '/../orm/vendor/autoload.php';

```
Overhead of loading LAravel with 100 product in magento is : 0.0051751136779785 seconds 
10 products: 0.0026481151580811 seconds.
Just autoload:  0.00015616416931152 seconds.
So, there is no overhead of adding this life hack to Magento. Magento 2 framework is an instinct dinosaur. 

# Magento GraphQL for Laravel/Eloquent

Lighthouse is a GraphQL framework that integrates with MAgento Eloquent Laravel application. It takes the best ideas of both and combines them to solve common tasks with ease and offer flexibility when you need it.

More information:

https://lighthouse-php.com/

It is really Cool Magento developers can enjoy building modern software and not just debug and troubleshoot broken MAgento 2 

# Debug Queries using the Laravel Query Log
Laravel query log that collects all queries within a request. You can enable this log, run your query and dump the output.

```
DB::enableQueryLog();

App\User::query()
    ->where('created_at', '<', now()->subYear())
    ->with('assignedApps', 'courses')
    ->orderBy('email', 'asc')
    ->limit(5)
    ->get();

dump(DB::getQueryLog());
```

# Listening For Query Events

If you would like to receive each SQL query executed by your application, you may use the listen method. This method is useful for logging queries or debugging. You may register your query listener in a service provider:

app/Providers/AppServiceProvider.php

```
<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
           var_dump(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
```
