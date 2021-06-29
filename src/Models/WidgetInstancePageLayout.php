<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WidgetInstancePageLayout
 * 
 * @property int $page_id
 * @property int $layout_update_id
 * 
 * @property WidgetInstancePage $widget_instance_page
 * @property LayoutUpdate $layout_update
 *
 * @package Laragento\Models
 */
class WidgetInstancePageLayout extends Model
{
	protected $table = 'widget_instance_page_layout';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'page_id' => 'int',
		'layout_update_id' => 'int'
	];

	public function widget_instance_page()
	{
		return $this->belongsTo(WidgetInstancePage::class, 'page_id');
	}

	public function layout_update()
	{
		return $this->belongsTo(LayoutUpdate::class);
	}
}
