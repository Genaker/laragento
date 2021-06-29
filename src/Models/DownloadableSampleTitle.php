<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DownloadableSampleTitle
 * 
 * @property int $title_id
 * @property int $sample_id
 * @property int $store_id
 * @property string|null $title
 * 
 * @property DownloadableSample $downloadable_sample
 * @property Store $store
 *
 * @package Laragento\Models
 */
class DownloadableSampleTitle extends Model
{
	protected $table = 'downloadable_sample_title';
	protected $primaryKey = 'title_id';
	public $timestamps = false;

	protected $casts = [
		'sample_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'sample_id',
		'store_id',
		'title'
	];

	public function downloadable_sample()
	{
		return $this->belongsTo(DownloadableSample::class, 'sample_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
