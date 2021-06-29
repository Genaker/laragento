<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Theme
 * 
 * @property int $theme_id
 * @property int|null $parent_id
 * @property string|null $theme_path
 * @property string $theme_title
 * @property string|null $preview_image
 * @property bool $is_featured
 * @property string $area
 * @property int $type
 * @property string|null $code
 * 
 * @property Collection|LayoutLink[] $layout_links
 * @property Collection|ThemeFile[] $theme_files
 * @property Collection|WidgetInstance[] $widget_instances
 *
 * @package Laragento\Models
 */
class Theme extends Model
{
	protected $table = 'theme';
	protected $primaryKey = 'theme_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'is_featured' => 'bool',
		'type' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'theme_path',
		'theme_title',
		'preview_image',
		'is_featured',
		'area',
		'type',
		'code'
	];

	public function layout_links()
	{
		return $this->hasMany(LayoutLink::class);
	}

	public function theme_files()
	{
		return $this->hasMany(ThemeFile::class);
	}

	public function widget_instances()
	{
		return $this->hasMany(WidgetInstance::class);
	}
}
