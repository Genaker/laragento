<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesSequenceMetum
 * 
 * @property int $meta_id
 * @property string $entity_type
 * @property int $store_id
 * @property string $sequence_table
 * 
 * @property Collection|SalesSequenceProfile[] $sales_sequence_profiles
 *
 * @package Laragento\Models
 */
class SalesSequenceMetum extends Model
{
	protected $table = 'sales_sequence_meta';
	protected $primaryKey = 'meta_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int'
	];

	protected $fillable = [
		'entity_type',
		'store_id',
		'sequence_table'
	];

	public function sales_sequence_profiles()
	{
		return $this->hasMany(SalesSequenceProfile::class, 'meta_id');
	}
}
