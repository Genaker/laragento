<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxCalculation
 * 
 * @property int $tax_calculation_id
 * @property int $tax_calculation_rate_id
 * @property int $tax_calculation_rule_id
 * @property int $customer_tax_class_id
 * @property int $product_tax_class_id
 * 
 * @property TaxClass $tax_class
 * @property TaxCalculationRate $tax_calculation_rate
 * @property TaxCalculationRule $tax_calculation_rule
 *
 * @package Laragento\Models
 */
class TaxCalculation extends Model
{
	protected $table = 'tax_calculation';
	protected $primaryKey = 'tax_calculation_id';
	public $timestamps = false;

	protected $casts = [
		'tax_calculation_rate_id' => 'int',
		'tax_calculation_rule_id' => 'int',
		'customer_tax_class_id' => 'int',
		'product_tax_class_id' => 'int'
	];

	protected $fillable = [
		'tax_calculation_rate_id',
		'tax_calculation_rule_id',
		'customer_tax_class_id',
		'product_tax_class_id'
	];

	public function tax_class()
	{
		return $this->belongsTo(TaxClass::class, 'product_tax_class_id');
	}

	public function tax_calculation_rate()
	{
		return $this->belongsTo(TaxCalculationRate::class);
	}

	public function tax_calculation_rule()
	{
		return $this->belongsTo(TaxCalculationRule::class);
	}
}
