<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VaultPaymentToken
 * 
 * @property int $entity_id
 * @property int|null $customer_id
 * @property string $public_hash
 * @property string $payment_method_code
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon|null $expires_at
 * @property string $gateway_token
 * @property string|null $details
 * @property bool $is_active
 * @property bool $is_visible
 * 
 * @property CustomerEntity|null $customer_entity
 * @property Collection|VaultPaymentTokenOrderPaymentLink[] $vault_payment_token_order_payment_links
 *
 * @package Laragento\Models
 */
class VaultPaymentToken extends Model
{
	protected $table = 'vault_payment_token';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'is_active' => 'bool',
		'is_visible' => 'bool'
	];

	protected $dates = [
		'expires_at'
	];

	protected $hidden = [
		'gateway_token'
	];

	protected $fillable = [
		'customer_id',
		'public_hash',
		'payment_method_code',
		'type',
		'expires_at',
		'gateway_token',
		'details',
		'is_active',
		'is_visible'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function vault_payment_token_order_payment_links()
	{
		return $this->hasMany(VaultPaymentTokenOrderPaymentLink::class, 'payment_token_id');
	}
}
