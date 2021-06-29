<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Quote
 * 
 * @property int $entity_id
 * @property int $store_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $converted_at
 * @property int|null $is_active
 * @property int|null $is_virtual
 * @property int|null $is_multi_shipping
 * @property int|null $items_count
 * @property float|null $items_qty
 * @property int|null $orig_order_id
 * @property float|null $store_to_base_rate
 * @property float|null $store_to_quote_rate
 * @property string|null $base_currency_code
 * @property string|null $store_currency_code
 * @property string|null $quote_currency_code
 * @property float|null $grand_total
 * @property float|null $base_grand_total
 * @property string|null $checkout_method
 * @property int|null $customer_id
 * @property int|null $customer_tax_class_id
 * @property int|null $customer_group_id
 * @property string|null $customer_email
 * @property string|null $customer_prefix
 * @property string|null $customer_firstname
 * @property string|null $customer_middlename
 * @property string|null $customer_lastname
 * @property string|null $customer_suffix
 * @property Carbon|null $customer_dob
 * @property string|null $customer_note
 * @property int|null $customer_note_notify
 * @property int|null $customer_is_guest
 * @property string|null $remote_ip
 * @property string|null $applied_rule_ids
 * @property string|null $reserved_order_id
 * @property string|null $password_hash
 * @property string|null $coupon_code
 * @property string|null $global_currency_code
 * @property float|null $base_to_global_rate
 * @property float|null $base_to_quote_rate
 * @property string|null $customer_taxvat
 * @property string|null $customer_gender
 * @property float|null $subtotal
 * @property float|null $base_subtotal
 * @property float|null $subtotal_with_discount
 * @property float|null $base_subtotal_with_discount
 * @property int|null $is_changed
 * @property int $trigger_recollect
 * @property string|null $ext_shipping_info
 * @property int|null $gift_message_id
 * @property int|null $is_persistent
 * 
 * @property Store $store
 * @property Collection|QuoteAddress[] $quote_addresses
 * @property Collection|QuoteIdMask[] $quote_id_masks
 * @property Collection|QuoteItem[] $quote_items
 * @property Collection|QuotePayment[] $quote_payments
 *
 * @package Laragento\Models
 */
class Quote extends Model
{
	protected $table = 'quote';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'store_id' => 'int',
		'is_active' => 'int',
		'is_virtual' => 'int',
		'is_multi_shipping' => 'int',
		'items_count' => 'int',
		'items_qty' => 'float',
		'orig_order_id' => 'int',
		'store_to_base_rate' => 'float',
		'store_to_quote_rate' => 'float',
		'grand_total' => 'float',
		'base_grand_total' => 'float',
		'customer_id' => 'int',
		'customer_tax_class_id' => 'int',
		'customer_group_id' => 'int',
		'customer_note_notify' => 'int',
		'customer_is_guest' => 'int',
		'base_to_global_rate' => 'float',
		'base_to_quote_rate' => 'float',
		'subtotal' => 'float',
		'base_subtotal' => 'float',
		'subtotal_with_discount' => 'float',
		'base_subtotal_with_discount' => 'float',
		'is_changed' => 'int',
		'trigger_recollect' => 'int',
		'gift_message_id' => 'int',
		'is_persistent' => 'int'
	];

	protected $dates = [
		'converted_at',
		'customer_dob'
	];

	protected $fillable = [
		'store_id',
		'converted_at',
		'is_active',
		'is_virtual',
		'is_multi_shipping',
		'items_count',
		'items_qty',
		'orig_order_id',
		'store_to_base_rate',
		'store_to_quote_rate',
		'base_currency_code',
		'store_currency_code',
		'quote_currency_code',
		'grand_total',
		'base_grand_total',
		'checkout_method',
		'customer_id',
		'customer_tax_class_id',
		'customer_group_id',
		'customer_email',
		'customer_prefix',
		'customer_firstname',
		'customer_middlename',
		'customer_lastname',
		'customer_suffix',
		'customer_dob',
		'customer_note',
		'customer_note_notify',
		'customer_is_guest',
		'remote_ip',
		'applied_rule_ids',
		'reserved_order_id',
		'password_hash',
		'coupon_code',
		'global_currency_code',
		'base_to_global_rate',
		'base_to_quote_rate',
		'customer_taxvat',
		'customer_gender',
		'subtotal',
		'base_subtotal',
		'subtotal_with_discount',
		'base_subtotal_with_discount',
		'is_changed',
		'trigger_recollect',
		'ext_shipping_info',
		'gift_message_id',
		'is_persistent'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function quote_addresses()
	{
		return $this->hasMany(QuoteAddress::class);
	}

	public function quote_id_masks()
	{
		return $this->hasMany(QuoteIdMask::class);
	}

	public function quote_items()
	{
		return $this->hasMany(QuoteItem::class);
	}

	public function quote_payments()
	{
		return $this->hasMany(QuotePayment::class);
	}
}
