<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReviewStore
 * 
 * @property int $review_id
 * @property int $store_id
 * 
 * @property Review $review
 * @property Store $store
 *
 * @package Laragento\Models
 */
class ReviewStore extends Model
{
	protected $table = 'review_store';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'review_id' => 'int',
		'store_id' => 'int'
	];

	public function review()
	{
		return $this->belongsTo(Review::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
