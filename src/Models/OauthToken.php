<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthToken
 * 
 * @property int $entity_id
 * @property int|null $consumer_id
 * @property int|null $admin_id
 * @property int|null $customer_id
 * @property string $type
 * @property string $token
 * @property string $secret
 * @property string|null $verifier
 * @property string $callback_url
 * @property int $revoked
 * @property int $authorized
 * @property int|null $user_type
 * @property Carbon $created_at
 * 
 * @property AdminUser|null $admin_user
 * @property OauthConsumer|null $oauth_consumer
 * @property CustomerEntity|null $customer_entity
 *
 * @package Laragento\Models
 */
class OauthToken extends Model
{
	protected $table = 'oauth_token';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'consumer_id' => 'int',
		'admin_id' => 'int',
		'customer_id' => 'int',
		'revoked' => 'int',
		'authorized' => 'int',
		'user_type' => 'int'
	];

	protected $hidden = [
		'token',
		'secret'
	];

	protected $fillable = [
		'consumer_id',
		'admin_id',
		'customer_id',
		'type',
		'token',
		'secret',
		'verifier',
		'callback_url',
		'revoked',
		'authorized',
		'user_type'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class, 'admin_id');
	}

	public function oauth_consumer()
	{
		return $this->belongsTo(OauthConsumer::class, 'consumer_id');
	}

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}
}
