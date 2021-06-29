# Laragento LAravel MAgento Micro service 

A collection of Model classes that allows you to get data directly from a Magento 2 database.

laragento is a collection of PHP classes built on top of Eloquent ORM (from Laravel framework), that provides a fluent interface to connect and get data directly from a Magento database.

You can use legacy MAgento 2 as the backend (administration panel), and any other PHP app in the other side querying those data (as a Model layer). It's easier to use Laragento with Laravel, but you're free to use it with any PHP project that uses Composer.

# LAravel MAgento with Tinker (REPL)

Laravel Tinker is a powerful REPL for the Laravel framework, powered by the PsySH package.

# Installation

All Laravel applications include Tinker by default. However, you may install Tinker using Composer if you have previously removed it from your application:


```
composer create-project laravel/laravel laragento 
cd laragento
composer require laravel/tinker
```

# Usage

Tinker allows you to interact with your entire Laravel application on the command line, including your Eloquent models (Laragento), jobs, events, and more. To enter the Tinker environment, run the tinker Artisan command:
```
php artisan tinker
```
