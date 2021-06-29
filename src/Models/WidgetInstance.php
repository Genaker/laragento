<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WidgetInstance
 * 
 * @property int $instance_id
 * @property string|null $instance_type
 * @property int $theme_id
 * @property string|null $title
 * @property string $store_ids
 * @property string|null $widget_parameters
 * @property int $sort_order
 * 
 * @property Theme $theme
 * @property Collection|WidgetInstancePage[] $widget_instance_pages
 *
 * @package Laragento\Models
 */
class WidgetInstance extends Model
{
	protected $table = 'widget_instance';
	protected $primaryKey = 'instance_id';
	public $timestamps = false;

	protected $casts = [
		'theme_id' => 'int',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'instance_type',
		'theme_id',
		'title',
		'store_ids',
		'widget_parameters',
		'sort_order'
	];

	public function theme()
	{
		return $this->belongsTo(Theme::class);
	}

	public function widget_instance_pages()
	{
		return $this->hasMany(WidgetInstancePage::class, 'instance_id');
	}
}
