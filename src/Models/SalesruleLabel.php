<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesruleLabel
 * 
 * @property int $label_id
 * @property int $rule_id
 * @property int $store_id
 * @property string|null $label
 * 
 * @property Salesrule $salesrule
 * @property Store $store
 *
 * @package Laragento\Models
 */
class SalesruleLabel extends Model
{
	protected $table = 'salesrule_label';
	protected $primaryKey = 'label_id';
	public $timestamps = false;

	protected $casts = [
		'rule_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'rule_id',
		'store_id',
		'label'
	];

	public function salesrule()
	{
		return $this->belongsTo(Salesrule::class, 'rule_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
