<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesSequenceProfile
 * 
 * @property int $profile_id
 * @property int $meta_id
 * @property string|null $prefix
 * @property string|null $suffix
 * @property int $start_value
 * @property int $step
 * @property int $max_value
 * @property int $warning_value
 * @property bool $is_active
 * 
 * @property SalesSequenceMetum $sales_sequence_metum
 *
 * @package Laragento\Models
 */
class SalesSequenceProfile extends Model
{
	protected $table = 'sales_sequence_profile';
	protected $primaryKey = 'profile_id';
	public $timestamps = false;

	protected $casts = [
		'meta_id' => 'int',
		'start_value' => 'int',
		'step' => 'int',
		'max_value' => 'int',
		'warning_value' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'meta_id',
		'prefix',
		'suffix',
		'start_value',
		'step',
		'max_value',
		'warning_value',
		'is_active'
	];

	public function sales_sequence_metum()
	{
		return $this->belongsTo(SalesSequenceMetum::class, 'meta_id');
	}
}
