<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LayoutUpdate
 * 
 * @property int $layout_update_id
 * @property string|null $handle
 * @property string|null $xml
 * @property int $sort_order
 * @property Carbon|null $updated_at
 * 
 * @property Collection|LayoutLink[] $layout_links
 * @property Collection|WidgetInstancePageLayout[] $widget_instance_page_layouts
 *
 * @package Laragento\Models
 */
class LayoutUpdate extends Model
{
	protected $table = 'layout_update';
	protected $primaryKey = 'layout_update_id';
	public $timestamps = false;

	protected $casts = [
		'sort_order' => 'int'
	];

	protected $fillable = [
		'handle',
		'xml',
		'sort_order'
	];

	public function layout_links()
	{
		return $this->hasMany(LayoutLink::class);
	}

	public function widget_instance_page_layouts()
	{
		return $this->hasMany(WidgetInstancePageLayout::class);
	}
}
