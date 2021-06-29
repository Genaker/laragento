<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Widget
 * 
 * @property int $widget_id
 * @property string|null $widget_code
 * @property string|null $widget_type
 * @property string|null $parameters
 *
 * @package Laragento\Models
 */
class Widget extends Model
{
	protected $table = 'widget';
	protected $primaryKey = 'widget_id';
	public $timestamps = false;

	protected $fillable = [
		'widget_code',
		'widget_type',
		'parameters'
	];
}
