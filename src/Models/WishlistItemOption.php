<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WishlistItemOption
 * 
 * @property int $option_id
 * @property int $wishlist_item_id
 * @property int $product_id
 * @property string $code
 * @property string|null $value
 * 
 * @property WishlistItem $wishlist_item
 *
 * @package Laragento\Models
 */
class WishlistItemOption extends Model
{
	protected $table = 'wishlist_item_option';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	protected $casts = [
		'wishlist_item_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'wishlist_item_id',
		'product_id',
		'code',
		'value'
	];

	public function wishlist_item()
	{
		return $this->belongsTo(WishlistItem::class);
	}
}
