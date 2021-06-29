<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxCalculationRule
 * 
 * @property int $tax_calculation_rule_id
 * @property string $code
 * @property int $priority
 * @property int $position
 * @property int $calculate_subtotal
 * 
 * @property Collection|TaxCalculation[] $tax_calculations
 *
 * @package Laragento\Models
 */
class TaxCalculationRule extends Model
{
	protected $table = 'tax_calculation_rule';
	protected $primaryKey = 'tax_calculation_rule_id';
	public $timestamps = false;

	protected $casts = [
		'priority' => 'int',
		'position' => 'int',
		'calculate_subtotal' => 'int'
	];

	protected $fillable = [
		'code',
		'priority',
		'position',
		'calculate_subtotal'
	];

	public function tax_calculations()
	{
		return $this->hasMany(TaxCalculation::class);
	}
}
