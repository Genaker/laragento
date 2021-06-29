<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectoryCountry
 * 
 * @property string $country_id
 * @property string|null $iso2_code
 * @property string|null $iso3_code
 * 
 * @property Collection|WeeeTax[] $weee_taxes
 *
 * @package Laragento\Models
 */
class DirectoryCountry extends Model
{
	protected $table = 'directory_country';
	protected $primaryKey = 'country_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'iso2_code',
		'iso3_code'
	];

	public function weee_taxes()
	{
		return $this->hasMany(WeeeTax::class, 'country');
	}
}
