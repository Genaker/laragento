<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectoryCountryRegionName
 * 
 * @property string $locale
 * @property int $region_id
 * @property string|null $name
 * 
 * @property DirectoryCountryRegion $directory_country_region
 *
 * @package Laragento\Models
 */
class DirectoryCountryRegionName extends Model
{
	protected $table = 'directory_country_region_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function directory_country_region()
	{
		return $this->belongsTo(DirectoryCountryRegion::class, 'region_id');
	}
}
