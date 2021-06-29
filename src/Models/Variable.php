<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Variable
 * 
 * @property int $variable_id
 * @property string|null $code
 * @property string|null $name
 * 
 * @property Collection|VariableValue[] $variable_values
 *
 * @package Laragento\Models
 */
class Variable extends Model
{
	protected $table = 'variable';
	protected $primaryKey = 'variable_id';
	public $timestamps = false;

	protected $fillable = [
		'code',
		'name'
	];

	public function variable_values()
	{
		return $this->hasMany(VariableValue::class);
	}
}
