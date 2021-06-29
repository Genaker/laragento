<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DesignConfigGridFlat
 * 
 * @property int $entity_id
 * @property int|null $store_website_id
 * @property int|null $store_group_id
 * @property int|null $store_id
 * @property string|null $theme_theme_id
 *
 * @package Laragento\Models
 */
class DesignConfigGridFlat extends Model
{
	protected $table = 'design_config_grid_flat';
	protected $primaryKey = 'entity_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'store_website_id' => 'int',
		'store_group_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'store_website_id',
		'store_group_id',
		'store_id',
		'theme_theme_id'
	];
}
