<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersistentSession
 * 
 * @property int $persistent_id
 * @property string $key
 * @property int|null $customer_id
 * @property int $website_id
 * @property string|null $info
 * @property Carbon $updated_at
 * 
 * @property CustomerEntity|null $customer_entity
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class PersistentSession extends Model
{
	protected $table = 'persistent_session';
	protected $primaryKey = 'persistent_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'website_id' => 'int'
	];

	protected $fillable = [
		'key',
		'customer_id',
		'website_id',
		'info'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
