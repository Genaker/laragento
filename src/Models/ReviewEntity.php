<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReviewEntity
 * 
 * @property int $entity_id
 * @property string $entity_code
 * 
 * @property Collection|Review[] $reviews
 *
 * @package Laragento\Models
 */
class ReviewEntity extends Model
{
	protected $table = 'review_entity';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $fillable = [
		'entity_code'
	];

	public function reviews()
	{
		return $this->hasMany(Review::class, 'entity_id');
	}
}
