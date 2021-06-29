<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxCalculationRate
 * 
 * @property int $tax_calculation_rate_id
 * @property string $tax_country_id
 * @property int $tax_region_id
 * @property string|null $tax_postcode
 * @property string $code
 * @property float $rate
 * @property int|null $zip_is_range
 * @property int|null $zip_from
 * @property int|null $zip_to
 * 
 * @property Collection|TaxCalculation[] $tax_calculations
 * @property Collection|TaxCalculationRateTitle[] $tax_calculation_rate_titles
 *
 * @package Laragento\Models
 */
class TaxCalculationRate extends Model
{
	protected $table = 'tax_calculation_rate';
	protected $primaryKey = 'tax_calculation_rate_id';
	public $timestamps = false;

	protected $casts = [
		'tax_region_id' => 'int',
		'rate' => 'float',
		'zip_is_range' => 'int',
		'zip_from' => 'int',
		'zip_to' => 'int'
	];

	protected $fillable = [
		'tax_country_id',
		'tax_region_id',
		'tax_postcode',
		'code',
		'rate',
		'zip_is_range',
		'zip_from',
		'zip_to'
	];

	public function tax_calculations()
	{
		return $this->hasMany(TaxCalculation::class);
	}

	public function tax_calculation_rate_titles()
	{
		return $this->hasMany(TaxCalculationRateTitle::class);
	}
}
