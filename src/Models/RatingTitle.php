<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RatingTitle
 * 
 * @property int $rating_id
 * @property int $store_id
 * @property string $value
 * 
 * @property Rating $rating
 * @property Store $store
 *
 * @package Laragento\Models
 */
class RatingTitle extends Model
{
	protected $table = 'rating_title';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rating_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'value'
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
