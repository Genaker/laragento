<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WidgetInstancePage
 * 
 * @property int $page_id
 * @property int $instance_id
 * @property string|null $page_group
 * @property string|null $layout_handle
 * @property string|null $block_reference
 * @property string|null $page_for
 * @property string|null $entities
 * @property string|null $page_template
 * 
 * @property WidgetInstance $widget_instance
 * @property Collection|WidgetInstancePageLayout[] $widget_instance_page_layouts
 *
 * @package Laragento\Models
 */
class WidgetInstancePage extends Model
{
	protected $table = 'widget_instance_page';
	protected $primaryKey = 'page_id';
	public $timestamps = false;

	protected $casts = [
		'instance_id' => 'int'
	];

	protected $fillable = [
		'instance_id',
		'page_group',
		'layout_handle',
		'block_reference',
		'page_for',
		'entities',
		'page_template'
	];

	public function widget_instance()
	{
		return $this->belongsTo(WidgetInstance::class, 'instance_id');
	}

	public function widget_instance_page_layouts()
	{
		return $this->hasMany(WidgetInstancePageLayout::class, 'page_id');
	}
}
