# Laragento LAravel MAgento Micro services

Magento 2 has legacy outdatab codebased based on Zend Framework 1 and with realy ugly ORM. 

This repo is a collection of Model classes that allows you to get data directly from a Magento 2 database using modern **ORM**.

laragento is a collection of PHP classes built on top of Eloquent ORM (from Laravel framework), that provides a fluent interface to connect and get data directly from a Magento database.

You can use legacy MAgento 2 as the backend (administration panel), and any other PHP app in the other side querying those data (as a Model layer). It's easier to use Laragento with Laravel, but you're free to use it with any PHP project that uses Composer.

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
