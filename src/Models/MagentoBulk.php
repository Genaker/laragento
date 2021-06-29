<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MagentoBulk
 * 
 * @property int $id
 * @property varbinary|null $uuid
 * @property int|null $user_id
 * @property int|null $user_type
 * @property string|null $description
 * @property int $operation_count
 * @property Carbon $start_time
 * 
 * @property MagentoAcknowledgedBulk $magento_acknowledged_bulk
 * @property Collection|MagentoOperation[] $magento_operations
 *
 * @package Laragento\Models
 */
class MagentoBulk extends Model
{
	protected $table = 'magento_bulk';
	public $timestamps = false;

	protected $casts = [
		'uuid' => 'varbinary',
		'user_id' => 'int',
		'user_type' => 'int',
		'operation_count' => 'int'
	];

	protected $dates = [
		'start_time'
	];

	protected $fillable = [
		'uuid',
		'user_id',
		'user_type',
		'description',
		'operation_count',
		'start_time'
	];

	public function magento_acknowledged_bulk()
	{
		return $this->hasOne(MagentoAcknowledgedBulk::class, 'bulk_uuid', 'uuid');
	}

	public function magento_operations()
	{
		return $this->hasMany(MagentoOperation::class, 'bulk_uuid', 'uuid');
	}
}
