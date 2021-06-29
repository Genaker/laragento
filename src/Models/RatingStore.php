<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RatingStore
 * 
 * @property int $rating_id
 * @property int $store_id
 * 
 * @property Rating $rating
 * @property Store $store
 *
 * @package Laragento\Models
 */
class RatingStore extends Model
{
	protected $table = 'rating_store';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rating_id' => 'int',
		'store_id' => 'int'
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
