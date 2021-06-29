<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LayoutLink
 * 
 * @property int $layout_link_id
 * @property int $store_id
 * @property int $theme_id
 * @property int $layout_update_id
 * @property bool $is_temporary
 * 
 * @property LayoutUpdate $layout_update
 * @property Store $store
 * @property Theme $theme
 *
 * @package Laragento\Models
 */
class LayoutLink extends Model
{
	protected $table = 'layout_link';
	protected $primaryKey = 'layout_link_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'theme_id' => 'int',
		'layout_update_id' => 'int',
		'is_temporary' => 'bool'
	];

	protected $fillable = [
		'store_id',
		'theme_id',
		'layout_update_id',
		'is_temporary'
	];

	public function layout_update()
	{
		return $this->belongsTo(LayoutUpdate::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function theme()
	{
		return $this->belongsTo(Theme::class);
	}
}
