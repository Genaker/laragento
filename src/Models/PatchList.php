<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PatchList
 * 
 * @property int $patch_id
 * @property string $patch_name
 *
 * @package Laragento\Models
 */
class PatchList extends Model
{
	protected $table = 'patch_list';
	protected $primaryKey = 'patch_id';
	public $timestamps = false;

	protected $fillable = [
		'patch_name'
	];
}
