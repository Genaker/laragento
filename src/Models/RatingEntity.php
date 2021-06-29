<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RatingEntity
 * 
 * @property int $entity_id
 * @property string $entity_code
 * 
 * @property Collection|Rating[] $ratings
 *
 * @package Laragento\Models
 */
class RatingEntity extends Model
{
	protected $table = 'rating_entity';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $fillable = [
		'entity_code'
	];

	public function ratings()
	{
		return $this->hasMany(Rating::class, 'entity_id');
	}
}
