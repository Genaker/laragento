<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RatingOption
 * 
 * @property int $option_id
 * @property int $rating_id
 * @property string $code
 * @property int $value
 * @property int $position
 * 
 * @property Rating $rating
 * @property Collection|RatingOptionVote[] $rating_option_votes
 *
 * @package Laragento\Models
 */
class RatingOption extends Model
{
	protected $table = 'rating_option';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	protected $casts = [
		'rating_id' => 'int',
		'value' => 'int',
		'position' => 'int'
	];

	protected $fillable = [
		'rating_id',
		'code',
		'value',
		'position'
	];

	public function rating()
	{
		return $this->belongsTo(Rating::class);
	}

	public function rating_option_votes()
	{
		return $this->hasMany(RatingOptionVote::class, 'option_id');
	}
}
