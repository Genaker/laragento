<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CheckoutAgreement
 * 
 * @property int $agreement_id
 * @property string|null $name
 * @property string|null $content
 * @property string|null $content_height
 * @property string|null $checkbox_text
 * @property int $is_active
 * @property int $is_html
 * @property int $mode
 * 
 * @property Collection|Store[] $stores
 *
 * @package Laragento\Models
 */
class CheckoutAgreement extends Model
{
	protected $table = 'checkout_agreement';
	protected $primaryKey = 'agreement_id';
	public $timestamps = false;

	protected $casts = [
		'is_active' => 'int',
		'is_html' => 'int',
		'mode' => 'int'
	];

	protected $fillable = [
		'name',
		'content',
		'content_height',
		'checkbox_text',
		'is_active',
		'is_html',
		'mode'
	];

	public function stores()
	{
		return $this->belongsToMany(Store::class, 'checkout_agreement_store', 'agreement_id');
	}
}
