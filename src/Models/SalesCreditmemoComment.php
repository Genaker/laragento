<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesCreditmemoComment
 * 
 * @property int $entity_id
 * @property int $parent_id
 * @property int|null $is_customer_notified
 * @property int $is_visible_on_front
 * @property string|null $comment
 * @property Carbon $created_at
 * 
 * @property SalesCreditmemo $sales_creditmemo
 *
 * @package Laragento\Models
 */
class SalesCreditmemoComment extends Model
{
	protected $table = 'sales_creditmemo_comment';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'is_customer_notified' => 'int',
		'is_visible_on_front' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'is_customer_notified',
		'is_visible_on_front',
		'comment'
	];

	public function sales_creditmemo()
	{
		return $this->belongsTo(SalesCreditmemo::class, 'parent_id');
	}
}
