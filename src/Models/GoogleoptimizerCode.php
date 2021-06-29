<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GoogleoptimizerCode
 * 
 * @property int $code_id
 * @property int $entity_id
 * @property string|null $entity_type
 * @property int $store_id
 * @property string|null $experiment_script
 * 
 * @property Store $store
 *
 * @package Laragento\Models
 */
class GoogleoptimizerCode extends Model
{
	protected $table = 'googleoptimizer_code';
	protected $primaryKey = 'code_id';
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'entity_id',
		'entity_type',
		'store_id',
		'experiment_script'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
