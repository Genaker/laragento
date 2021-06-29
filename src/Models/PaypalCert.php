<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaypalCert
 * 
 * @property int $cert_id
 * @property int $website_id
 * @property string|null $content
 * @property Carbon|null $updated_at
 * 
 * @property StoreWebsite $store_website
 *
 * @package Laragento\Models
 */
class PaypalCert extends Model
{
	protected $table = 'paypal_cert';
	protected $primaryKey = 'cert_id';
	public $timestamps = false;

	protected $casts = [
		'website_id' => 'int'
	];

	protected $fillable = [
		'website_id',
		'content'
	];

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}
}
