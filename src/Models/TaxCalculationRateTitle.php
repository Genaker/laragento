<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxCalculationRateTitle
 * 
 * @property int $tax_calculation_rate_title_id
 * @property int $tax_calculation_rate_id
 * @property int $store_id
 * @property string $value
 * 
 * @property TaxCalculationRate $tax_calculation_rate
 * @property Store $store
 *
 * @package Laragento\Models
 */
class TaxCalculationRateTitle extends Model
{
	protected $table = 'tax_calculation_rate_title';
	protected $primaryKey = 'tax_calculation_rate_title_id';
	public $timestamps = false;

	protected $casts = [
		'tax_calculation_rate_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'tax_calculation_rate_id',
		'store_id',
		'value'
	];

	public function tax_calculation_rate()
	{
		return $this->belongsTo(TaxCalculationRate::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
