<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Translation
 * 
 * @property int $key_id
 * @property string $string
 * @property int $store_id
 * @property string|null $translate
 * @property string $locale
 * @property int $crc_string
 * 
 * @property Store $store
 *
 * @package Laragento\Models
 */
class Translation extends Model
{
	protected $table = 'translation';
	protected $primaryKey = 'key_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'crc_string' => 'int'
	];

	protected $fillable = [
		'string',
		'store_id',
		'translate',
		'locale',
		'crc_string'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
