<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MagentoOperation
 * 
 * @property int $id
 * @property int|null $operation_key
 * @property varbinary|null $bulk_uuid
 * @property string|null $topic_name
 * @property boolean|null $serialized_data
 * @property boolean|null $result_serialized_data
 * @property int|null $status
 * @property int|null $error_code
 * @property string|null $result_message
 * 
 * @property MagentoBulk|null $magento_bulk
 *
 * @package Laragento\Models
 */
class MagentoOperation extends Model
{
	protected $table = 'magento_operation';
	public $timestamps = false;

	protected $casts = [
		'operation_key' => 'int',
		'bulk_uuid' => 'varbinary',
		'serialized_data' => 'boolean',
		'result_serialized_data' => 'boolean',
		'status' => 'int',
		'error_code' => 'int'
	];

	protected $fillable = [
		'operation_key',
		'bulk_uuid',
		'topic_name',
		'serialized_data',
		'result_serialized_data',
		'status',
		'error_code',
		'result_message'
	];

	public function magento_bulk()
	{
		return $this->belongsTo(MagentoBulk::class, 'bulk_uuid', 'uuid');
	}
}
