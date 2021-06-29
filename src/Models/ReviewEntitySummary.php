<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReviewEntitySummary
 * 
 * @property int $primary_id
 * @property int $entity_pk_value
 * @property int $entity_type
 * @property int $reviews_count
 * @property int $rating_summary
 * @property int $store_id
 * 
 * @property Store $store
 *
 * @package Laragento\Models
 */
class ReviewEntitySummary extends Model
{
	protected $table = 'review_entity_summary';
	protected $primaryKey = 'primary_id';
	public $timestamps = false;

	protected $casts = [
		'entity_pk_value' => 'int',
		'entity_type' => 'int',
		'reviews_count' => 'int',
		'rating_summary' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'entity_pk_value',
		'entity_type',
		'reviews_count',
		'rating_summary',
		'store_id'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
