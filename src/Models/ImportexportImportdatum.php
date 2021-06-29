<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImportexportImportdatum
 * 
 * @property int $id
 * @property string $entity
 * @property string $behavior
 * @property string|null $data
 *
 * @package Laragento\Models
 */
class ImportexportImportdatum extends Model
{
	protected $table = 'importexport_importdata';
	public $timestamps = false;

	protected $fillable = [
		'entity',
		'behavior',
		'data'
	];
}
