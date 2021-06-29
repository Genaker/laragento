<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wishlist
 * 
 * @property int $wishlist_id
 * @property int $customer_id
 * @property int $shared
 * @property string|null $sharing_code
 * @property Carbon|null $updated_at
 * 
 * @property CustomerEntity $customer_entity
 * @property Collection|WishlistItem[] $wishlist_items
 *
 * @package Laragento\Models
 */
class Wishlist extends Model
{
	protected $table = 'wishlist';
	protected $primaryKey = 'wishlist_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'shared' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'shared',
		'sharing_code'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function wishlist_items()
	{
		return $this->hasMany(WishlistItem::class);
	}
}
