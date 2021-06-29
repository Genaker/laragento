<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuoteItemOption
 * 
 * @property int $option_id
 * @property int $item_id
 * @property int $product_id
 * @property string $code
 * @property string|null $value
 * 
 * @property QuoteItem $quote_item
 *
 * @package Laragento\Models
 */
class QuoteItemOption extends Model
{
	protected $table = 'quote_item_option';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	protected $casts = [
		'item_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'item_id',
		'product_id',
		'code',
		'value'
	];

	public function quote_item()
	{
		return $this->belongsTo(QuoteItem::class, 'item_id');
	}
}
