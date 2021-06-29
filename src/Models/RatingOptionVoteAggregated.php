<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RatingOptionVoteAggregated
 * 
 * @property int $primary_id
 * @property int $rating_id
 * @property int $entity_pk_value
 * @property int $vote_count
 * @property int $vote_value_sum
 * @property int $percent
 * @property int|null $percent_approved
 * @property int $store_id
 * 
 * @property Rating $rating
 * @property Store $store
 *
 * @package Laragento\Models
 */
class RatingOptionVoteAggregated extends Model
{
	protected $table = 'rating_option_vote_aggregated';
	protected $primaryKey = 'primary_id';
	public $timestamps = false;

	protected $casts = [
		'rating_id' => 'int',
		'entity_pk_value' => 'int',
		'vote_count' => 'int',
		'vote_value_sum' => 'int',
		'percent' => 'int',
		'percent_approved' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'rating_id',
		'entity_pk_value',
		'vote_count',
		'vote_value_sum',
		'percent',
		'percent_approved',
		'store_id'
	];

	public function rating()
	{
		return $this->belongsTo(Rating::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
