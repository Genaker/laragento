<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReviewDetail
 * 
 * @property int $detail_id
 * @property int $review_id
 * @property int|null $store_id
 * @property string $title
 * @property string $detail
 * @property string $nickname
 * @property int|null $customer_id
 * 
 * @property CustomerEntity|null $customer_entity
 * @property Review $review
 * @property Store|null $store
 *
 * @package Laragento\Models
 */
class ReviewDetail extends Model
{
	protected $table = 'review_detail';
	protected $primaryKey = 'detail_id';
	public $timestamps = false;

	protected $casts = [
		'review_id' => 'int',
		'store_id' => 'int',
		'customer_id' => 'int'
	];

	protected $fillable = [
		'review_id',
		'store_id',
		'title',
		'detail',
		'nickname',
		'customer_id'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function review()
	{
		return $this->belongsTo(Review::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
