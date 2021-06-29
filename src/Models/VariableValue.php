<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VariableValue
 * 
 * @property int $value_id
 * @property int $variable_id
 * @property int $store_id
 * @property string|null $plain_value
 * @property string|null $html_value
 * 
 * @property Store $store
 * @property Variable $variable
 *
 * @package Laragento\Models
 */
class VariableValue extends Model
{
	protected $table = 'variable_value';
	protected $primaryKey = 'value_id';
	public $timestamps = false;

	protected $casts = [
		'variable_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'variable_id',
		'store_id',
		'plain_value',
		'html_value'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function variable()
	{
		return $this->belongsTo(Variable::class);
	}
}
