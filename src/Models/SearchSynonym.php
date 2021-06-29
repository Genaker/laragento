<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SearchSynonym
 * 
 * @property int $group_id
 * @property string $synonyms
 * @property int $store_id
 * @property int $website_id
 * 
 * @property Store $store
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class SearchSynonym extends Model
{
	protected $table = 'search_synonyms';
	protected $primaryKey = 'group_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'website_id' => 'int'
	];

	protected $fillable = [
		'synonyms',
		'store_id',
		'website_id'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
