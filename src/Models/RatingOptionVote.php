<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RatingOptionVote
 * 
 * @property int $vote_id
 * @property int $option_id
 * @property string $remote_ip
 * @property int $remote_ip_long
 * @property int|null $customer_id
 * @property int $entity_pk_value
 * @property int $rating_id
 * @property int|null $review_id
 * @property int $percent
 * @property int $value
 * 
 * @property RatingOption $rating_option
 * @property Review|null $review
 *
 * @package Laragento\Models
 */
class RatingOptionVote extends Model
{
	protected $table = 'rating_option_vote';
	protected $primaryKey = 'vote_id';
	public $timestamps = false;

	protected $casts = [
		'option_id' => 'int',
		'remote_ip_long' => 'int',
		'customer_id' => 'int',
		'entity_pk_value' => 'int',
		'rating_id' => 'int',
		'review_id' => 'int',
		'percent' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'option_id',
		'remote_ip',
		'remote_ip_long',
		'customer_id',
		'entity_pk_value',
		'rating_id',
		'review_id',
		'percent',
		'value'
	];

	public function rating_option()
	{
		return $this->belongsTo(RatingOption::class, 'option_id');
	}

	public function review()
	{
		return $this->belongsTo(Review::class);
	}
}
