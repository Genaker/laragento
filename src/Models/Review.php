<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $review_id
 * @property Carbon $created_at
 * @property int $entity_id
 * @property int $entity_pk_value
 * @property int $status_id
 * 
 * @property ReviewEntity $review_entity
 * @property ReviewStatus $review_status
 * @property Collection|RatingOptionVote[] $rating_option_votes
 * @property Collection|ReviewDetail[] $review_details
 * @property Collection|Store[] $stores
 *
 * @package Laragento\Models
 */
class Review extends Model
{
	protected $table = 'review';
	protected $primaryKey = 'review_id';
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'entity_pk_value' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'entity_id',
		'entity_pk_value',
		'status_id'
	];

	public function review_entity()
	{
		return $this->belongsTo(ReviewEntity::class, 'entity_id');
	}

	public function review_status()
	{
		return $this->belongsTo(ReviewStatus::class, 'status_id');
	}

	public function rating_option_votes()
	{
		return $this->hasMany(RatingOptionVote::class);
	}

	public function review_details()
	{
		return $this->hasMany(ReviewDetail::class);
	}

	public function stores()
	{
		return $this->belongsToMany(Store::class);
	}
}
