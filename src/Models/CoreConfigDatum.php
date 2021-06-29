<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreConfigDatum
 * 
 * @property int $config_id
 * @property string $scope
 * @property int $scope_id
 * @property string $path
 * @property string|null $value
 * @property Carbon $updated_at
 *
 * @package Laragento\Models
 */
class CoreConfigDatum extends Model
{
	protected $table = 'core_config_data';
	protected $primaryKey = 'config_id';
	public $timestamps = false;

	protected $casts = [
		'scope_id' => 'int'
	];

	protected $fillable = [
		'scope',
		'scope_id',
		'path',
		'value'
	];
}
