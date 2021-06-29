# Laragento LAravel MAgento Micro services

Magento 2 has legacy code based on abandoned Zend Framework 1 with realy ugly ORM on top of outdated Zend_DB. Zend_DB even not hte latest version. 

This repo is a collection of Model classes that allows you to get data directly from a Magento 2 database using modern **ORM**.

laragento is a collection of PHP classes built on top of Eloquent ORM (from Laravel framework), that provides a fluent interface to connect and get data directly from a Magento database.

You can use legacy MAgento 2 as the backend (administration panel), and any other PHP app in the other side querying those data (as a Model layer). It's easier to use Laragento with Laravel, but you're free to use it with any PHP project that uses Composer.

# Magento ORM Concept

Models are the essence of the ORM. A model is an abstraction that represents a magento table in your database. In Larafento, it is a class that extends Model.

The model tells Eloquent several things about the entity it represents, such as the name of the table in the database and which columns it has (and their data types).

A model in Eloquent has a name. This name does not have to be the same name of the table it represents in the database. Usually, models have singular names (such as User) while tables have pluralized names (such as Users), although this is fully configurable.



# Install Laragento 

You need to use Composer to install Laragento into your project:


```
composer config repositories.foo '{"type": "vcs", "url": "https://github.com/Genaker/laragento", "trunk-path": "master"}'
composer require Genaker/laragento
```
# Other PHP Framework (not Laravel) Setup

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

$invoices = App\Models\SalesInvoice::limit(1)->with('sales_order','sales_invoice_items','sales_invoice_comments')->get(); $invoices->toJson();


```

# Laravel/Eloquent ans static::methods

Some Mmagento 2 bloatware lovers hates static methods. For that guys Laravel has solution...

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
add to the **app/bootstrap.php**
```

```
