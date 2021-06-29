<?php

namespace Laragento;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class DB
 */
class DB
{
    /**
     * @var array
     */
    protected static $baseParams = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => 'wp_',
    ];

    /**
     * @param array $params
     * @return \Illuminate\Database\Capsule\Manager
     */
    public static function connect(array $params)
    {
        $capsule = new Capsule();

        $params = array_merge(static::$baseParams, $params);
        $capsule->addConnection($params);
        $capsule->bootEloquent();
        
         $capsule->bootEloquent();

            if($options['events']) $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher);

            if($options['global']) $capsule->setAsGlobal();

            if($options['log']) $capsule->getConnection()->enableQueryLog();

        return $capsule;
    }
}
