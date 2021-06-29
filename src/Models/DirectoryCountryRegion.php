<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectoryCountryRegion
 * 
 * @property int $region_id
 * @property string $country_id
 * @property string|null $code
 * @property string|null $default_name
 * 
 * @property Collection|DirectoryCountryRegionName[] $directory_country_region_names
 *
 * @package Laragento\Models
 */
class DirectoryCountryRegion extends Model
{
	protected $table = 'directory_country_region';
	protected $primaryKey = 'region_id';
	public $timestamps = false;

	protected $fillable = [
		'country_id',
		'code',
		'default_name'
	];

	public function directory_country_region_names()
	{
		return $this->hasMany(DirectoryCountryRegionName::class, 'region_id');
	}
}
