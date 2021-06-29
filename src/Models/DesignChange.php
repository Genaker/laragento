<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DesignChange
 * 
 * @property int $design_change_id
 * @property int $store_id
 * @property string|null $design
 * @property Carbon|null $date_from
 * @property Carbon|null $date_to
 * 
 * @property Store $store
 *
 * @package Laragento\Models
 */
class DesignChange extends Model
{
	protected $table = 'design_change';
	protected $primaryKey = 'design_change_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int'
	];

	protected $dates = [
		'date_from',
		'date_to'
	];

	protected $fillable = [
		'store_id',
		'design',
		'date_from',
		'date_to'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
