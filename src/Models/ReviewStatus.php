<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReviewStatus
 * 
 * @property int $status_id
 * @property string $status_code
 * 
 * @property Collection|Review[] $reviews
 *
 * @package Laragento\Models
 */
class ReviewStatus extends Model
{
	protected $table = 'review_status';
	protected $primaryKey = 'status_id';
	public $timestamps = false;

	protected $fillable = [
		'status_code'
	];

	public function reviews()
	{
		return $this->hasMany(Review::class, 'status_id');
	}
}
