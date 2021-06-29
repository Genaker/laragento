<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthNonce
 * 
 * @property string $nonce
 * @property int $timestamp
 * @property int $consumer_id
 * 
 * @property OauthConsumer $oauth_consumer
 *
 * @package Laragento\Models
 */
class OauthNonce extends Model
{
	protected $table = 'oauth_nonce';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timestamp' => 'int',
		'consumer_id' => 'int'
	];

	protected $fillable = [
		'timestamp'
	];

	public function oauth_consumer()
	{
		return $this->belongsTo(OauthConsumer::class, 'consumer_id');
	}
}
