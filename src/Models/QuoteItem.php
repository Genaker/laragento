<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuoteItem
 * 
 * @property int $item_id
 * @property int $quote_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $product_id
 * @property int|null $store_id
 * @property int|null $parent_item_id
 * @property int|null $is_virtual
 * @property string|null $sku
 * @property string|null $name
 * @property string|null $description
 * @property string|null $applied_rule_ids
 * @property string|null $additional_data
 * @property int|null $is_qty_decimal
 * @property int|null $no_discount
 * @property float|null $weight
 * @property float $qty
 * @property float $price
 * @property float $base_price
 * @property float|null $custom_price
 * @property float|null $discount_percent
 * @property float|null $discount_amount
 * @property float|null $base_discount_amount
 * @property float|null $tax_percent
 * @property float|null $tax_amount
 * @property float|null $base_tax_amount
 * @property float $row_total
 * @property float $base_row_total
 * @property float|null $row_total_with_discount
 * @property float|null $row_weight
 * @property string|null $product_type
 * @property float|null $base_tax_before_discount
 * @property float|null $tax_before_discount
 * @property float|null $original_custom_price
 * @property string|null $redirect_url
 * @property float|null $base_cost
 * @property float|null $price_incl_tax
 * @property float|null $base_price_incl_tax
 * @property float|null $row_total_incl_tax
 * @property float|null $base_row_total_incl_tax
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property int|null $gift_message_id
 * @property int $free_shipping
 * @property string|null $weee_tax_applied
 * @property float|null $weee_tax_applied_amount
 * @property float|null $weee_tax_applied_row_amount
 * @property float|null $weee_tax_disposition
 * @property float|null $weee_tax_row_disposition
 * @property float|null $base_weee_tax_applied_amount
 * @property float|null $base_weee_tax_applied_row_amnt
 * @property float|null $base_weee_tax_disposition
 * @property float|null $base_weee_tax_row_disposition
 * 
 * @property QuoteItem|null $quote_item
 * @property Quote $quote
 * @property Store|null $store
 * @property Collection|QuoteAddressItem[] $quote_address_items
 * @property Collection|QuoteItem[] $quote_items
 * @property Collection|QuoteItemOption[] $quote_item_options
 *
 * @package Laragento\Models
 */
class QuoteItem extends Model
{
	protected $table = 'quote_item';
	protected $primaryKey = 'item_id';

	protected $casts = [
		'quote_id' => 'int',
		'product_id' => 'int',
		'store_id' => 'int',
		'parent_item_id' => 'int',
		'is_virtual' => 'int',
		'is_qty_decimal' => 'int',
		'no_discount' => 'int',
		'weight' => 'float',
		'qty' => 'float',
		'price' => 'float',
		'base_price' => 'float',
		'custom_price' => 'float',
		'discount_percent' => 'float',
		'discount_amount' => 'float',
		'base_discount_amount' => 'float',
		'tax_percent' => 'float',
		'tax_amount' => 'float',
		'base_tax_amount' => 'float',
		'row_total' => 'float',
		'base_row_total' => 'float',
		'row_total_with_discount' => 'float',
		'row_weight' => 'float',
		'base_tax_before_discount' => 'float',
		'tax_before_discount' => 'float',
		'original_custom_price' => 'float',
		'base_cost' => 'float',
		'price_incl_tax' => 'float',
		'base_price_incl_tax' => 'float',
		'row_total_incl_tax' => 'float',
		'base_row_total_incl_tax' => 'float',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
		'gift_message_id' => 'int',
		'free_shipping' => 'int',
		'weee_tax_applied_amount' => 'float',
		'weee_tax_applied_row_amount' => 'float',
		'weee_tax_disposition' => 'float',
		'weee_tax_row_disposition' => 'float',
		'base_weee_tax_applied_amount' => 'float',
		'base_weee_tax_applied_row_amnt' => 'float',
		'base_weee_tax_disposition' => 'float',
		'base_weee_tax_row_disposition' => 'float'
	];

	protected $fillable = [
		'quote_id',
		'product_id',
		'store_id',
		'parent_item_id',
		'is_virtual',
		'sku',
		'name',
		'description',
		'applied_rule_ids',
		'additional_data',
		'is_qty_decimal',
		'no_discount',
		'weight',
		'qty',
		'price',
		'base_price',
		'custom_price',
		'discount_percent',
		'discount_amount',
		'base_discount_amount',
		'tax_percent',
		'tax_amount',
		'base_tax_amount',
		'row_total',
		'base_row_total',
		'row_total_with_discount',
		'row_weight',
		'product_type',
		'base_tax_before_discount',
		'tax_before_discount',
		'original_custom_price',
		'redirect_url',
		'base_cost',
		'price_incl_tax',
		'base_price_incl_tax',
		'row_total_incl_tax',
		'base_row_total_incl_tax',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'gift_message_id',
		'free_shipping',
		'weee_tax_applied',
		'weee_tax_applied_amount',
		'weee_tax_applied_row_amount',
		'weee_tax_disposition',
		'weee_tax_row_disposition',
		'base_weee_tax_applied_amount',
		'base_weee_tax_applied_row_amnt',
		'base_weee_tax_disposition',
		'base_weee_tax_row_disposition'
	];

	public function quote_item()
	{
		return $this->belongsTo(QuoteItem::class, 'parent_item_id');
	}

	public function quote()
	{
		return $this->belongsTo(Quote::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function quote_address_items()
	{
		return $this->hasMany(QuoteAddressItem::class);
	}

	public function quote_items()
	{
		return $this->hasMany(QuoteItem::class, 'parent_item_id');
	}

	public function quote_item_options()
	{
		return $this->hasMany(QuoteItemOption::class, 'item_id');
	}
}
