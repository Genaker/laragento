<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuoteShippingRate
 * 
 * @property int $rate_id
 * @property int $address_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $carrier
 * @property string|null $carrier_title
 * @property string|null $code
 * @property string|null $method
 * @property string|null $method_description
 * @property float $price
 * @property string|null $error_message
 * @property string|null $method_title
 * 
 * @property QuoteAddress $quote_address
 *
 * @package Laragento\Models
 */
class QuoteShippingRate extends Model
{
	protected $table = 'quote_shipping_rate';
	protected $primaryKey = 'rate_id';

	protected $casts = [
		'address_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'address_id',
		'carrier',
		'carrier_title',
		'code',
		'method',
		'method_description',
		'price',
		'error_message',
		'method_title'
	];

	public function quote_address()
	{
		return $this->belongsTo(QuoteAddress::class, 'address_id');
	}
}
