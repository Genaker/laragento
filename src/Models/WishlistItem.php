<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WishlistItem
 * 
 * @property int $wishlist_item_id
 * @property int $wishlist_id
 * @property int $product_id
 * @property int|null $store_id
 * @property Carbon|null $added_at
 * @property string|null $description
 * @property float $qty
 * 
 * @property CatalogProductEntity $catalog_product_entity
 * @property Store|null $store
 * @property Wishlist $wishlist
 * @property Collection|WishlistItemOption[] $wishlist_item_options
 *
 * @package Laragento\Models
 */
class WishlistItem extends Model
{
	protected $table = 'wishlist_item';
	protected $primaryKey = 'wishlist_item_id';
	public $timestamps = false;

	protected $casts = [
		'wishlist_id' => 'int',
		'product_id' => 'int',
		'store_id' => 'int',
		'qty' => 'float'
	];

	protected $dates = [
		'added_at'
	];

	protected $fillable = [
		'wishlist_id',
		'product_id',
		'store_id',
		'added_at',
		'description',
		'qty'
	];

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function wishlist()
	{
		return $this->belongsTo(Wishlist::class);
	}

	public function wishlist_item_options()
	{
		return $this->hasMany(WishlistItemOption::class);
	}
}
