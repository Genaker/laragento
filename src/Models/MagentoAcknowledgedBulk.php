<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MagentoAcknowledgedBulk
 * 
 * @property int $id
 * @property varbinary|null $bulk_uuid
 * 
 * @property MagentoBulk|null $magento_bulk
 *
 * @package Laragento\Models
 */
class MagentoAcknowledgedBulk extends Model
{
	protected $table = 'magento_acknowledged_bulk';
	public $timestamps = false;

	protected $casts = [
		'bulk_uuid' => 'varbinary'
	];

	protected $fillable = [
		'bulk_uuid'
	];

	public function magento_bulk()
	{
		return $this->belongsTo(MagentoBulk::class, 'bulk_uuid', 'uuid');
	}
}
