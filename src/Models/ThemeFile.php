<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ThemeFile
 * 
 * @property int $theme_files_id
 * @property int $theme_id
 * @property string|null $file_path
 * @property string $file_type
 * @property string $content
 * @property int $sort_order
 * @property bool $is_temporary
 * 
 * @property Theme $theme
 *
 * @package Laragento\Models
 */
class ThemeFile extends Model
{
	protected $table = 'theme_file';
	protected $primaryKey = 'theme_files_id';
	public $timestamps = false;

	protected $casts = [
		'theme_id' => 'int',
		'sort_order' => 'int',
		'is_temporary' => 'bool'
	];

	protected $fillable = [
		'theme_id',
		'file_path',
		'file_type',
		'content',
		'sort_order',
		'is_temporary'
	];

	public function theme()
	{
		return $this->belongsTo(Theme::class);
	}
}
