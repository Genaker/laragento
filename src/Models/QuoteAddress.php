<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuoteAddress
 * 
 * @property int $address_id
 * @property int $quote_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $customer_id
 * @property int|null $save_in_address_book
 * @property int|null $customer_address_id
 * @property string|null $address_type
 * @property string|null $email
 * @property string|null $prefix
 * @property string|null $firstname
 * @property string|null $middlename
 * @property string|null $lastname
 * @property string|null $suffix
 * @property string|null $company
 * @property string|null $street
 * @property string|null $city
 * @property string|null $region
 * @property int|null $region_id
 * @property string|null $postcode
 * @property string|null $country_id
 * @property string|null $telephone
 * @property string|null $fax
 * @property int $same_as_billing
 * @property int $collect_shipping_rates
 * @property string|null $shipping_method
 * @property string|null $shipping_description
 * @property float $weight
 * @property float $subtotal
 * @property float $base_subtotal
 * @property float $subtotal_with_discount
 * @property float $base_subtotal_with_discount
 * @property float $tax_amount
 * @property float $base_tax_amount
 * @property float $shipping_amount
 * @property float $base_shipping_amount
 * @property float|null $shipping_tax_amount
 * @property float|null $base_shipping_tax_amount
 * @property float $discount_amount
 * @property float $base_discount_amount
 * @property float $grand_total
 * @property float $base_grand_total
 * @property string|null $customer_notes
 * @property string|null $applied_taxes
 * @property string|null $discount_description
 * @property float|null $shipping_discount_amount
 * @property float|null $base_shipping_discount_amount
 * @property float|null $subtotal_incl_tax
 * @property float|null $base_subtotal_total_incl_tax
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property float|null $shipping_discount_tax_compensation_amount
 * @property float|null $base_shipping_discount_tax_compensation_amnt
 * @property float|null $shipping_incl_tax
 * @property float|null $base_shipping_incl_tax
 * @property string|null $vat_id
 * @property int|null $vat_is_valid
 * @property string|null $vat_request_id
 * @property string|null $vat_request_date
 * @property int|null $vat_request_success
 * @property string|null $validated_country_code
 * @property string|null $validated_vat_number
 * @property int|null $gift_message_id
 * @property int $free_shipping
 * 
 * @property Quote $quote
 * @property Collection|QuoteAddressItem[] $quote_address_items
 * @property Collection|QuoteShippingRate[] $quote_shipping_rates
 *
 * @package Laragento\Models
 */
class QuoteAddress extends Model
{
	protected $table = 'quote_address';
	protected $primaryKey = 'address_id';

	protected $casts = [
		'quote_id' => 'int',
		'customer_id' => 'int',
		'save_in_address_book' => 'int',
		'customer_address_id' => 'int',
		'region_id' => 'int',
		'same_as_billing' => 'int',
		'collect_shipping_rates' => 'int',
		'weight' => 'float',
		'subtotal' => 'float',
		'base_subtotal' => 'float',
		'subtotal_with_discount' => 'float',
		'base_subtotal_with_discount' => 'float',
		'tax_amount' => 'float',
		'base_tax_amount' => 'float',
		'shipping_amount' => 'float',
		'base_shipping_amount' => 'float',
		'shipping_tax_amount' => 'float',
		'base_shipping_tax_amount' => 'float',
		'discount_amount' => 'float',
		'base_discount_amount' => 'float',
		'grand_total' => 'float',
		'base_grand_total' => 'float',
		'shipping_discount_amount' => 'float',
		'base_shipping_discount_amount' => 'float',
		'subtotal_incl_tax' => 'float',
		'base_subtotal_total_incl_tax' => 'float',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
		'shipping_discount_tax_compensation_amount' => 'float',
		'base_shipping_discount_tax_compensation_amnt' => 'float',
		'shipping_incl_tax' => 'float',
		'base_shipping_incl_tax' => 'float',
		'vat_is_valid' => 'int',
		'vat_request_success' => 'int',
		'gift_message_id' => 'int',
		'free_shipping' => 'int'
	];

	protected $fillable = [
		'quote_id',
		'customer_id',
		'save_in_address_book',
		'customer_address_id',
		'address_type',
		'email',
		'prefix',
		'firstname',
		'middlename',
		'lastname',
		'suffix',
		'company',
		'street',
		'city',
		'region',
		'region_id',
		'postcode',
		'country_id',
		'telephone',
		'fax',
		'same_as_billing',
		'collect_shipping_rates',
		'shipping_method',
		'shipping_description',
		'weight',
		'subtotal',
		'base_subtotal',
		'subtotal_with_discount',
		'base_subtotal_with_discount',
		'tax_amount',
		'base_tax_amount',
		'shipping_amount',
		'base_shipping_amount',
		'shipping_tax_amount',
		'base_shipping_tax_amount',
		'discount_amount',
		'base_discount_amount',
		'grand_total',
		'base_grand_total',
		'customer_notes',
		'applied_taxes',
		'discount_description',
		'shipping_discount_amount',
		'base_shipping_discount_amount',
		'subtotal_incl_tax',
		'base_subtotal_total_incl_tax',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'shipping_discount_tax_compensation_amount',
		'base_shipping_discount_tax_compensation_amnt',
		'shipping_incl_tax',
		'base_shipping_incl_tax',
		'vat_id',
		'vat_is_valid',
		'vat_request_id',
		'vat_request_date',
		'vat_request_success',
		'validated_country_code',
		'validated_vat_number',
		'gift_message_id',
		'free_shipping'
	];

	public function quote()
	{
		return $this->belongsTo(Quote::class);
	}

	public function quote_address_items()
	{
		return $this->hasMany(QuoteAddressItem::class);
	}

	public function quote_shipping_rates()
	{
		return $this->hasMany(QuoteShippingRate::class, 'address_id');
	}
}
