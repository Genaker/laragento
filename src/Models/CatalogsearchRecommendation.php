<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogsearchRecommendation
 * 
 * @property int $id
 * @property int $query_id
 * @property int $relation_id
 * 
 * @property SearchQuery $search_query
 *
 * @package Laragento\Models
 */
class CatalogsearchRecommendation extends Model
{
	protected $table = 'catalogsearch_recommendations';
	public $timestamps = false;

	protected $casts = [
		'query_id' => 'int',
		'relation_id' => 'int'
	];

	protected $fillable = [
		'query_id',
		'relation_id'
	];

	public function search_query()
	{
		return $this->belongsTo(SearchQuery::class, 'relation_id');
	}
}
