<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaxClass
 * 
 * @property int $class_id
 * @property string $class_name
 * @property string $class_type
 * 
 * @property Collection|TaxCalculation[] $tax_calculations
 *
 * @package Laragento\Models
 */
class TaxClass extends Model
{
	protected $table = 'tax_class';
	protected $primaryKey = 'class_id';
	public $timestamps = false;

	protected $fillable = [
		'class_name',
		'class_type'
	];

	public function tax_calculations()
	{
		return $this->hasMany(TaxCalculation::class, 'product_tax_class_id');
	}
}
