<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesInvoiceItem
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property float|null $base_price
 * @property float|null $tax_amount
 * @property float|null $base_row_total
 * @property float|null $discount_amount
 * @property float|null $row_total
 * @property float|null $base_discount_amount
 * @property float|null $price_incl_tax
 * @property float|null $base_tax_amount
 * @property float|null $base_price_incl_tax
 * @property float|null $qty
 * @property float|null $base_cost
 * @property float|null $price
 * @property float|null $base_row_total_incl_tax
 * @property float|null $row_total_incl_tax
 * @property int|null $product_id
 * @property int|null $order_item_id
 * @property string|null $additional_data
 * @property string|null $description
 * @property string|null $sku
 * @property string|null $name
 * @property float|null $discount_tax_compensation_amount
 * @property float|null $base_discount_tax_compensation_amount
 * @property string|null $tax_ratio
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
 * @property SalesInvoice $sales_invoice
 *
 * @package Laragento\Models
 */
class SalesInvoiceItem extends Model
{
	protected $table = 'sales_invoice_item';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'base_price' => 'float',
		'tax_amount' => 'float',
		'base_row_total' => 'float',
		'discount_amount' => 'float',
		'row_total' => 'float',
		'base_discount_amount' => 'float',
		'price_incl_tax' => 'float',
		'base_tax_amount' => 'float',
		'base_price_incl_tax' => 'float',
		'qty' => 'float',
		'base_cost' => 'float',
		'price' => 'float',
		'base_row_total_incl_tax' => 'float',
		'row_total_incl_tax' => 'float',
		'product_id' => 'int',
		'order_item_id' => 'int',
		'discount_tax_compensation_amount' => 'float',
		'base_discount_tax_compensation_amount' => 'float',
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
		'parent_id',
		'base_price',
		'tax_amount',
		'base_row_total',
		'discount_amount',
		'row_total',
		'base_discount_amount',
		'price_incl_tax',
		'base_tax_amount',
		'base_price_incl_tax',
		'qty',
		'base_cost',
		'price',
		'base_row_total_incl_tax',
		'row_total_incl_tax',
		'product_id',
		'order_item_id',
		'additional_data',
		'description',
		'sku',
		'name',
		'discount_tax_compensation_amount',
		'base_discount_tax_compensation_amount',
		'tax_ratio',
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

	public function sales_invoice()
	{
		return $this->belongsTo(SalesInvoice::class, 'parent_id');
	}
}
