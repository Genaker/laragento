<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rating
 * 
 * @property int $rating_id
 * @property int $entity_id
 * @property string $rating_code
 * @property int $position
 * @property int $is_active
 * 
 * @property RatingEntity $rating_entity
 * @property Collection|RatingOption[] $rating_options
 * @property Collection|RatingOptionVoteAggregated[] $rating_option_vote_aggregateds
 * @property Collection|Store[] $stores
 * @property Collection|RatingTitle[] $rating_titles
 *
 * @package Laragento\Models
 */
class Rating extends Model
{
	protected $table = 'rating';
	protected $primaryKey = 'rating_id';
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'position' => 'int',
		'is_active' => 'int'
	];

	protected $fillable = [
		'entity_id',
		'rating_code',
		'position',
		'is_active'
	];

	public function rating_entity()
	{
		return $this->belongsTo(RatingEntity::class, 'entity_id');
	}

	public function rating_options()
	{
		return $this->hasMany(RatingOption::class);
	}

	public function rating_option_vote_aggregateds()
	{
		return $this->hasMany(RatingOptionVoteAggregated::class);
	}

	public function stores()
	{
		return $this->belongsToMany(Store::class);
	}

	public function rating_titles()
	{
		return $this->hasMany(RatingTitle::class);
	}
}
