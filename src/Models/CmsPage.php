<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CmsPage
 * 
 * @property int $page_id
 * @property string|null $title
 * @property string|null $page_layout
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string|null $identifier
 * @property string|null $content_heading
 * @property string|null $content
 * @property Carbon $creation_time
 * @property Carbon $update_time
 * @property int $is_active
 * @property int $sort_order
 * @property string|null $layout_update_xml
 * @property string|null $custom_theme
 * @property string|null $custom_root_template
 * @property string|null $custom_layout_update_xml
 * @property string|null $layout_update_selected
 * @property Carbon|null $custom_theme_from
 * @property Carbon|null $custom_theme_to
 * @property string|null $meta_title
 * 
 * @property Collection|Store[] $stores
 *
 * @package Laragento\Models
 */
class CmsPage extends Model
{
	protected $table = 'cms_page';
	protected $primaryKey = 'page_id';
	public $timestamps = false;

	protected $casts = [
		'is_active' => 'int',
		'sort_order' => 'int'
	];

	protected $dates = [
		'creation_time',
		'update_time',
		'custom_theme_from',
		'custom_theme_to'
	];

	protected $fillable = [
		'title',
		'page_layout',
		'meta_keywords',
		'meta_description',
		'identifier',
		'content_heading',
		'content',
		'creation_time',
		'update_time',
		'is_active',
		'sort_order',
		'layout_update_xml',
		'custom_theme',
		'custom_root_template',
		'custom_layout_update_xml',
		'layout_update_selected',
		'custom_theme_from',
		'custom_theme_to',
		'meta_title'
	];

	public function stores()
	{
		return $this->belongsToMany(Store::class, 'cms_page_store', 'page_id');
	}
}
