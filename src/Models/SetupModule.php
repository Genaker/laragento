<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SetupModule
 * 
 * @property string $module
 * @property string|null $schema_version
 * @property string|null $data_version
 *
 * @package Laragento\Models
 */
class SetupModule extends Model
{
	protected $table = 'setup_module';
	protected $primaryKey = 'module';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'schema_version',
		'data_version'
	];
}
